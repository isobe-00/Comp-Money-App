<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Services\CheckFormServices;
use App\Http\Requests\StoreContactRequest;

class ContactFormController extends Controller
{
    /**
     * リソースの一覧を表示します。
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // 検索機能の対応
        $search = $request->search;
        $query = ContactForm::search($search);
        $contacts = $query->select('id', 'name', 'title', 'created_at')
            ->paginate(20);

        return view('contacts.index', compact('contacts'));
    }


    /**
     * 新しいリソースの作成フォームを表示します。
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // // フォームから送信されたデータの取得
        // $data = $request->all();
    
        // // ContactForm モデルを使用してデータを保存
        // ContactForm::create([
        //     'name' => $data['name'],
        //     'title' => $data['title'],
        //     'email' => $data['email'],
        //     'url' => $data['url'],
        //     'gender' => $data['gender'],
        //     'age' => $data['age'],
        //     'contact' => $data['contact'],
        // ]);
    
        // データ保存後、一覧画面にリダイレクト
        return view('contacts.create')->with('message', 'データが保存されました。');
        
    }
    

    /**
     * 新しく作成されたリソースを保存します。
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
     {
    //  dd($request->all());
         // dd($request->memo);
         // 新規作成フォーム表示
         //トランザクションをデータベースに保存
         ContactForm::create([
             'name' => $request->name,  
             'title' => $request->title,           
             'email' => $request->email,                
             'url' => $request->url,  
             'gender' => $request->gender,                
             'age' => $request->age,                
             'contact' => $request->contact,                

         ]);
         return redirect()->route('contacts.index');
     }
 
    /**
     * 指定されたリソースを表示します。
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $contact = ContactForm::find($id);


        // CheckFormServices を使用して性別と年齢を取得
        $gender = CheckFormServices::checkGender($contact);
        $age = CheckFormServices::checkAge($contact);

        return view(
            'contacts.show',
            compact('contact', 'gender', 'age')
        );
    }

    /**
     * 指定されたリソースの編集フォームを表示します。
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = ContactForm::find($id);

        return view('contacts.edit', compact('contact'));
    }

    /**
     * 指定されたリソースを更新します。
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 指定された ID の ContactForm を取得
        $contact = ContactForm::find($id);

        // フォームからのデータでリソースを更新
        $contact->name = $request->name;
        $contact->title = $request->title;
        $contact->email = $request->email;
        $contact->url = $request->url;
        $contact->gender = $request->gender;
        $contact->age = $request->age;
        $contact->contact = $request->contact;
        $contact->save();

        // 一覧画面にリダイレクト
        return redirect()->route('contacts.index', ['id' => $id]);
    }

    /**
     * 指定されたリソースを削除します。
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 指定された ID の ContactForm を取得して削除
        $contact = ContactForm::find($id);
        $contact->delete();

        // 一覧画面にリダイレクト
        return redirect()->route('contacts.index');
    }
}
