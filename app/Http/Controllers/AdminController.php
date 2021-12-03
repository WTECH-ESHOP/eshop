<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller {

    public function index() {
        $products = Product::paginate(12);

        return view('admin.index', [
            'products' => $products
        ]);
    }

    public function loginIndex() {
        return view('admin.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user->isAdmin())
            throw ValidationException::withMessages([
                'email' => 'This is not admin account.',
            ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            throw ValidationException::withMessages([
                'email' => 'These credentials do not match our records.',
            ]);
        }

        $request->session()->regenerate();

        return redirect(route('admin'));
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('admin.login.index'))
            ->with('success', 'Successfully logged out.');
    }

    public function show($id = null) {
        $product = Product::find($id);

        return view('admin.show', [
            'data' => $product
        ]);
    }

    public function store(Request $request, $id) {
        //
    }

    public function destroy($id) {
        Product::findOrFail($id)->delete();

        return redirect()->back()
            ->with('success', 'Product successfully removed');
    }
}
