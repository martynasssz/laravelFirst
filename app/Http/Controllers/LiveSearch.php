<?php
//
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//use \Illuminate\Support\Facades\DB; //statement with database class for database operation
//
//class LiveSearch extends Controller
//{
//    function index()
//    {
//        return view('live_search');
//    }
//
//    function action(Request $request) //function with request argument, this method will receive Ajax request for fetch data from customer table
//    {
//        if($request->ajax()) //under if condition we have write request variable  with ajax method. This condition will check if this method has receive any Ajax request or not. If this method receive any ajax request then it will execute if block of code.
//        {
//            $query = $request->get('query'); //$query is equal to request variable with get method. In brackets we write query, here we store value of query variable
//            if($query !='') //if query variable is not equal to blank, it will execute if block code
//            {
//                $data = DB::table('tbl_customer')->where('CustomerName','like','%'.$query.'%')
//                    ->orWhere('Adress','like','%'.$query.'%')
//                    ->orWhere('City', 'like', '%'.$query.'%')
//                    ->orWhere('PostalCode', 'like', '%'.$query.'%')
//                    ->orWhere('Country', 'like', '%'.$query.'%')
//                    ->get();
//            } else //we have want fetch all data from customer table
//            {
//                $data = DB::table('tbl_customer')->orderBy('CustomerID','desc')->get(); //get method execute query and return data in PHP object array
//            }
//            $total_row = $data->count(); //variable with count method, it will return number of rows in query execution
//            if($total_row >0)
//            {
//                $output='';
//                foreach ($data as $row)
//                {
//                    $output .= '
//                        <tr>
//                            <td> '.$row->CustomerName.'</td>
//                            <td> '.$row->Adress.'</td>
//                            <td> '.$row->City.'</td>
//                            <td> '.$row->PostalCode.'</td>
//                            <td> '.$row->Country.'</td>
//                        </tr>
//                    '; //$row->CustomerName with object customer name this code will print customer data
//                }
//            } else //write html table code  with no data found message
//            {
//                $output ='
//                <tr>
//                    <td align="center" colspan="5">No Data found </td>
//                </tr>
//                ';
//            }
//            $data = array( //this way we have store data in data variable
//                'table_data' =>$output, //data keys with values get from dollar output variable
//                'total_data' =>$total_row //total data key values has beet get from total row variable
//            );
//            echo json_encode($data); //now we sent data to ajax requests. This function will convert array to JSON string and sent to AJAX request
//        }
//
//    }
//
//
//}
