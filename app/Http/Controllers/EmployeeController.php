<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $list = Employee::orderBy( 'created_at', 'DESC' )->get();
        return view( 'index', compact( 'list' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        return view( 'create' );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $add = Employee::create( $request->all() );
        if ( $add ) {
            return redirect()->route( 'emplooyee.index' )->with( 'success', 'Record Added Successfully' );
        }
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        $emplooyee = Employee::find( $id );
        return view( 'show', compact( 'emplooyee' ) );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        $emplooyee = Employee::find( $id );
        return view( 'edit', compact( 'emplooyee' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        $update = Employee::where( 'id', $id )->update( [ 'name'=>$request->name, 'age'=>$request->age, 'salary'=>$request->salary ] );
        if ( $update ) {
            return redirect()->route( 'emplooyee.index' )->with( 'success', 'Record Update Successfully' );
        }
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        $delete = Employee::where( 'id', $id )->delete();
        if ( $delete ) {
            return response()->json( [ 'result'=>'pass', 'status'=>200, 'success'=> 'Record Delete Successfully' ] );
        }
    }
}