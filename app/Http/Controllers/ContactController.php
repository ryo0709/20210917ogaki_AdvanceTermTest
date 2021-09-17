<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(Request $request)
    {
        $lastName = $request->lastName;
        $firstName = $request->firstName;
        $postcode = $request->postcode;
        $address = $request->address;
        $email = $request->email;
        $building_name = $request->building_name;
        $opinion = $request->opinion;
        $gender = $request->gender;

        // 確認画面に表示する値を格納
        $data = [
            'lastName' => $lastName,
            'firstName' => $firstName,
            'postcode' => $postcode,
            'address' => $address,
            'email' => $email,
            'building_name' => $building_name,
            'opinion' => $opinion,
            'gender' => $gender
        ];

        $validate_rule = [
            'postcode' => ['required', 'regex:/^\d{3}\-\d{4}$/'],
            'lastName' => 'required',
            'firstName' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'address' => 'required',
            'opinion' => 'required|max:120',
        ];
        $this->validate($request, $validate_rule);

        return view('confirm', $data);
    }

    public function post(Request $request)
    {

        if ($request->get('back')) {
            return redirect('/')->withInput();
        }

        $form = $request->all();
        Contact::create($form);
        return redirect('/thanks');
    }

    public function management()
    {
        $items = Contact::Paginate(10);
        return view('/management', ['items' => $items]);
    }

    public function search(Request $request)
    {
        $fullname = $request->input('fullname');
        $gender = $request->input('gender');
        $email = $request->input('email');
        $created_at = $request->input('created_at');
        $updated_at = $request->input('updated_at');

        $query = Contact::query();

        if (!empty($fullname)) {
            $query->where('fullname', 'LIKE', "%{$fullname}%");
        }
        if (!empty($gender)) {
            $query->where('gender', 'LIKE', "%{$gender}%");
        }
        if (!empty($email)) {
            $query->where('email', 'LIKE', "%{$email}%");
        }
        if (!empty($created_at)) {
            $query->where('created_at', '>=', $created_at);
        }
        if (!empty($updated_at)) {
            $query->where('updated_at', '<=', $updated_at);
        }

        $items = $query->Paginate(10);
        $param = $request->param;

        return view('/management', ['items' => $items, 'param' => $param]);
    }
    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/management');
    }
}
