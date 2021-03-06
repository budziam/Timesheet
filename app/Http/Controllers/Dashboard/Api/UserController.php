<?php
namespace App\Http\Controllers\Dashboard\Api;

use App\Bases\Controller;
use App\Datatables\UserDatatable;
use App\Http\Requests\Dashboard\UserChangePasswordRequest;
use App\Http\Requests\Dashboard\UserDestroyRequest;
use App\Http\Requests\Dashboard\UserStoreUpdateRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Transformers\Dashboard\UserTransformer;
use App\ModelShaper\Datatable\DatatableFormRequest;
use App\ModelShaper\Datatable\DatatableShaper;
use App\ModelShaper\Select2\Select2FormRequest;
use App\ModelShaper\Select2\Select2Shaper;

class UserController extends Controller
{
    public function datatable(DatatableFormRequest $request)
    {
        $shaper = new DatatableShaper(app(UserDatatable::class));

        return $shaper->shape($request);
    }

    public function select2(Select2FormRequest $request)
    {
        $shaper = new Select2Shaper(User::instance(), 'fullname');

        return $shaper->shape($request);
    }

    public function show(User $user)
    {
        return fractal()
            ->item($user, new UserTransformer())
            ->toArray();
    }

    public function store(UserStoreUpdateRequest $request, UserRepository $repository)
    {
        $user = $repository->create($request->all());

        return fractal()
            ->item($user, new UserTransformer())
            ->toArray();
    }

    public function update(User $user, UserStoreUpdateRequest $request)
    {
        $user->update($request->all());

        return $this->responseSuccess();
    }

    public function destroy(User $user, UserDestroyRequest $request)
    {
        $user->delete();

        return $this->responseSuccess();
    }

    public function changePassword(User $user, UserChangePasswordRequest $request)
    {
        $user->update([
            'password' => bcrypt($request->input('password')),
        ]);

        return $this->responseSuccess();
    }
}
