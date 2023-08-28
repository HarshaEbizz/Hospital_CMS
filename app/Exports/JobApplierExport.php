<?php

namespace App\Exports;

use App\Models\JobApplyList;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromQuery;

class JobApplierExport implements FromQuery,WithMapping,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
       return JobApplyList::query();
    }
    public function map($data): array
    {
        return [
            $data->id,
            $data->application_type,
            $data->job_position,
            $data->full_name,
            $data->email,
            $data->country_code.$data->contact,
            $data->gender,
            $data->date,
            $data->marital_status,
            $data->qualification,
            $data->experience_year,
            $data->last_organization,
            $data->last_ctc,
            $data->last_designation,
            $data->information,
            str_replace("/public","",url('/')).'/storage/'.$data->file_path.$data->resume_file,
            $data->created_at,
        ];
    }
    public function headings(): array
    {
        return [
            '#',
            'Application Type',
            'Job Position',
            'Full Name',
            'Email',
            'Contact',
            'Gender',
            'Date of Birth',
            'Marital Status',
            'Qualification',
            'Total Experience',
            'Last Organization',
            'Last CTC',
            'Last Designation',
            'Optional Information',
            'Resume File',
            'Date',
        ];
    }
}
