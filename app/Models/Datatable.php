<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class Datatable extends Model
{
    public static function get_datatables($data)
	{
        return  DataTables::of($data)
		->addColumn('status', function ($data) {
			if ($data->status == 0) {
				return '<span style="color: green">Active</span>';
			} else {
				return '<span style="color: red">Inactive</span>';
			}
		})
        ->addColumn('action', function ($data) {
            $editBtn =  '<a onclick="edit_record('. $data->id .')" type="button" class="btn btn-sm btn-primary"><span class="fe fe-edit"> </span></a> &nbsp';
 
            $deleteBtn =  '<a type="button" class="btn btn-sm btn-danger" onclick="delete_record('. $data->id .')"><span class="fe fe-trash-2"> </span></a>';
 
            return $editBtn . $deleteBtn;
        })
        ->rawColumns(
        [
			'status',
            'action',
        ])
        ->make(true);
    }

    public static function get_datatables_package($data)
	{
        return  DataTables::of($data)
        
		->addColumn('status', function ($data) {
			if ($data->status == 0) {
				return '<span style="color: green">Active</span>';
			} else {
				return '<span style="color: red">Inactive</span>';
			}
		})
        ->addColumn('action', function ($data) {

			$ShowBtn =  '<a onclick="getPackageDetails('. $data->id .')" type="button" class="btn btn-sm btn-secondary"><span class="fe fe-eye"> </span></a> &nbsp';

            $editBtn =  '<a onclick="edit_record('. $data->id .')" type="button" class="btn btn-sm btn-primary"><span class="fe fe-edit"> </span></a> &nbsp';
 
            $deleteBtn =  '<a type="button" class="btn btn-sm btn-danger" onclick="delete_record('. $data->id .')"><span class="fe fe-trash-2"> </span></a>';
 
            return $ShowBtn . $editBtn . $deleteBtn;
        })
        ->rawColumns(
        [
            'service',
			'status',
            'action',
        ])
        ->make(true);
    }

	public static function get_datatables_package_Details($data){

		return  DataTables::of($data)
		->addColumn('service_id', function ($data) {
			if ($data->services) {
				return $data->services->name;
			} else {
				return $data->service_id;
			}
		})
		->addColumn('status', function ($data) {
			if ($data->status == 0) {
				return '<span style="color: green">Active</span>';
			} else {
				return '<span style="color: red">Inactive</span>';
			}
		})
		
        ->addColumn('action', function ($data) {
           
            $deleteBtn =  '<a type="button" class="btn btn-sm btn-danger" onclick="delete_record('. $data->id .')"><span class="fe fe-trash-2"> </span></a>';
 
            return  $deleteBtn;
        })
        ->rawColumns(
        [
			'status',
            'action',
        ])
        ->make(true);

	}

    public static function get_datatables_booking($data){

        return  DataTables::of($data)
        ->addColumn('user_id', function ($data) {
			if ($data->booking_user) {
				return $data->booking_user->name;
			} else {
				return $data->user_id;
			}
		})
        ->addColumn('service_id', function ($data) {
			if ($data->booking_services) {
				return $data->booking_services->name;
			} else {
				return $data->service_id;
			}
		})
        ->addColumn('package_id', function ($data) {
			if ($data->booking_package) {
				return $data->booking_package->name;
			} else {
				return $data->package_id;
			}
		})
        ->addColumn('assign_to_team_id', function ($data) {
			if ($data->booking_team) {
				return $data->booking_team->name;
			} else {
				return $data->assign_to_team_id;
			}
		})
		->addColumn('status', function ($data) {
			if ($data->status == 0) {
				return '<span style="color: green">Active</span>';
			} else {
				return '<span style="color: red">Inactive</span>';
			}
		})
        ->addColumn('action', function ($data) {
            $editBtn =  '<a onclick="edit_record('. $data->id .')" type="button" class="btn btn-sm btn-primary"><span class="fe fe-edit"> </span></a> &nbsp';
 
            $deleteBtn =  '<a type="button" class="btn btn-sm btn-danger" onclick="delete_record('. $data->id .')"><span class="fe fe-trash-2"> </span></a>';
 
            return $editBtn . $deleteBtn;
        })
        ->rawColumns(
        [
			'status',
            'action',
        ])
        ->make(true);

    }


	public static function get_datatables_payments($data){

		return  DataTables::of($data)
		->addColumn('payment_status', function ($data) {
			if ($data->payment_status == 'Success') {
				return '<span style="color: green">Success</span>';
			} else {
				return '<span style="color: red">Falied</span>';
			}
		})
		->addColumn('service_id', function ($data) {
			if ($data->booking_services) {
				return $data->booking_services->name;
			} else {
				return $data->service_id;
			}
		})
        ->addColumn('package_id', function ($data) {
			if ($data->booking_package) {
				return $data->booking_package->name;
			} else {
				return $data->package_id;
			}
		})
		->addColumn('user_id', function ($data) {
			if ($data->booking_user) {
				return $data->booking_user->name;
			} else {
				return $data->user_id;
			}
		})
        ->rawColumns(
        [
			'payment_status',
        ])
        ->make(true);

	}
}
