<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use App\Model\Employee\EquipmentLab;
use App\Model\BasicInformations\ScienceTool;
use App\Model\BasicInformations\MajorTechnology;
use App\Model\BasicInformations\TechnicalEquipment;
use App\Model\BasicInformations\ObjectiveUsage;
use App\Model\BasicInformations\EquipmentUsage;
use App\Model\BasicInformations\EquipmentCalibration;
use App\Model\BasicInformations\EquipmentMaintenance;
use App\Model\BasicInformations\EquipmentManual;
use App\Model\BasicInformations\EquipmentRent;
use Illuminate\Http\Request;

class EquipmentLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $allEquipmentLab = EquipmentLab::paginate(15);
        //$allEquipments = Equipment::all();
        //$allEstate = IndustrialEstate::all();
        //dd($allEquipmentLab->all());
        //return $allOrgData;
        //return $allEquipmentLab;
        return view('employee.equipmentLab.index',['showEquipmentLab'=>$allEquipmentLab]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allScienceTool = ScienceTool::where('science_tool_status','A')->get();
        $allMajorTechnology = MajorTechnology::where('major_tech_status','A')->get();
        $allTechnicalEquipment = TechnicalEquipment::where('technical_equipment_status','A')->get();
        $allObjectiveUsage = ObjectiveUsage::where('obj_usage_status','A')->get();
        $allEquipmentUsage = EquipmentUsage::where('equipment_usage_status','A')->get();
        $allEquipmentCalibration = EquipmentCalibration::where('equipment_calibration_status','A')->get();
        $allEquipmentMaintenance = EquipmentMaintenance::where('equipment_maintenance_status','A')->get();
        $allEquipmentManual = EquipmentManual::where('equipment_manual_status','A')->get();
        $allEquipmentRent = EquipmentRent::where('equipment_rent_status','A')->get();
        $data = [
            'scienceTools' => $allScienceTool,
            'majorTechnologies' => $allMajorTechnology,
            'technicalEquipments' => $allTechnicalEquipment,
            'objectiveUsages' => $allObjectiveUsage,
            'equipmentUsages' => $allEquipmentUsage,
            'equipmentCalibrations' => $allEquipmentCalibration,
            'equipmentMaintenances' => $allEquipmentMaintenance,
            'equipmentManuals' => $allEquipmentManual,
            'equipmentRents' => $allEquipmentRent,

        ];
        //dd($data);
        return view('employee.equipmentLab.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        
        //Validate Check
        $this->validateEquipmentLab();

        //clean up
        $equipmentLab = new EquipmentLab;
        $equipmentLab->user_id = auth()->user()->id;
        $equipmentLab->equipment_lab_id = $request['equipment_lab_id'];
        //$equipmentLab->equipments_id = $request['equipments_id'];
        $equipmentLab->science_tool_id = $request['science_tool_id'];
        $equipmentLab->science_tool_other_name = $request['science_tool_other_name'];
        $equipmentLab->science_tool_other_abbr = $request['science_tool_other_abbr'];
        $equipmentLab->equipment_name_th = $request['equipment_name_th'];
        $equipmentLab->equipment_brand = $request['equipment_brand'];
        $equipmentLab->equipment_model = $request['equipment_model'];
        $equipmentLab->equipment_org_code = $request['equipment_org_code'];
        $equipmentLab->major_technologies_other = $request[''];
        $equipmentLab->equipment_year = $request['equipment_year'];
        $equipmentLab->equipment_price = $request['equipment_price'];
        $equipmentLab->equipment_supplier = $request['equipment_supplier'];
        //$equipmentLab->major_technologies_id = $request['major_technologies_id'];
        //$equipmentLab->objective_usages_id = $request['objective_usages_id'];
        $equipmentLab->equipment_usage_id = $request['equipment_usage_id'];
        $equipmentLab->equipment_ability = $request['equipment_ability'];
        $equipmentLab->equipment_pic = $request['equipment_pic'];
        $equipmentLab->equipment_calibrations_id = $request['equipment_calibrations_id'];
        $equipmentLab->equipment_calibration_by = $request['equipment_calibration_by'];
        $equipmentLab->equipment_calibration_year = $request['equipment_calibration_year'];
        $equipmentLab->equipment_maintenance_id = $request['equipment_maintenance_id'];
        $equipmentLab->equipment_maintenance_other = $request['equipment_maintenance_other'];
        $equipmentLab->equipment_maintenance_budget = $request['equipment_maintenance_budget'];
        $equipmentLab->equipment_admin_name = $request['equipment_admin_name'];
        $equipmentLab->equipment_admin_phone = $request['equipment_admin_phone'];
        $equipmentLab->equipment_admin_email = $request['equipment_admin_email'];
        $equipmentLab->equipment_manuals_id = $request['equipment_manuals_id'];
        $equipmentLab->equipment_manual_name = $request['equipment_manual_name'];
        $equipmentLab->equipment_manual_locate = $request['equipment_manual_locate'];
        $equipmentLab->equipments_rent_id = $request['equipment_rent_id'];
        $equipmentLab->equipment_rent_fee = $request['equipment_rent_fee'];
        $equipmentLab->equipment_rent_detail = $request['equipment_rent_detail'];

        //dd($equipmentLab->all());
        $equipmentLab->save();
        $equipmentLab->majorTechnologies()->sync($request->major_technologies_id, false);
        $equipmentLab->objectiveUsages()->sync($request->objective_usages_id, false);

        return redirect()->route('equipmentLab.show', $equipmentLab->id);
        //return redirect('/equipmentLab');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EquipmentLab  $equipmentLab
     * @return \Illuminate\Http\Response
     */
    public function show(EquipmentLab $equipmentLab)
    {
        //return $equipmentLab;
        $equipmentLab = EquipmentLab::find($equipmentLab->id);
        //return $equipmentLab;
        return view('employee.equipmentLab.show', ['equipmentLabs' => $equipmentLab]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EquipmentLab  $equipmentLab
     * @return \Illuminate\Http\Response
     */
    public function edit(EquipmentLab $equipmentLab)
    {
        $allEquipmentLab = EquipmentLab::find($equipmentLab->id);
        $allEquipments = Equipment::where('equipment_status','A')->get();
        $allMajorTechnology = MajorTechnology::where('major_tech_status','A')->get();
        $allTechnicalEquipment = TechnicalEquipment::where('technical_equipment_status','A')->get();
        $allObjectiveUsage = ObjectiveUsage::where('obj_usage_status','A')->get();
        $allEquipmentUsage = EquipmentUsage::where('equipment_usage_status','A')->get();
        $allEquipmentCalibration = EquipmentCalibration::where('equipment_calibration_status','A')->get();
        $allEquipmentMaintenance = EquipmentMaintenance::where('equipment_maintenance_status','A')->get();
        $allEquipmentManual = EquipmentManual::where('equipment_manual_status','A')->get();
        $allEquipmentRent = EquipmentRent::where('equipment_rent_status','A')->get();
        $data = [
            'equipmentLab' => $allEquipmentLab,
            'equipments' => $allEquipments,
            'majorTechnologies' => $allMajorTechnology,
            'technicalEquipments' => $allTechnicalEquipment,
            'objectiveUsages' => $allObjectiveUsage,
            'equipmentUsages' => $allEquipmentUsage,
            'equipmentCalibrations' => $allEquipmentCalibration,
            'equipmentMaintenances' => $allEquipmentMaintenance,
            'equipmentManuals' => $allEquipmentManual,
            'equipmentRents' => $allEquipmentRent,

        ];
        // return $data;
        // dd($data);
        return view('employee.equipmentLab.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EquipmentLab  $equipmentLab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EquipmentLab $equipmentLab)
    {

        //Validate Check
        $this->validateEquipmentLab();

        $equipmentLab = EquipmentLab::find($equipmentLab->id);
        $equipmentLab->equipment_lab_id = $request['equipment_lab_id'];
        $equipmentLab->equipments_id = $request['equipments_id'];
        $equipmentLab->equipment_name_th = $request['equipment_name_th'];
        $equipmentLab->equipment_brand = $request['equipment_brand'];
        $equipmentLab->equipment_model = $request['equipment_model'];
        $equipmentLab->equipment_org_code = $request['equipment_org_code'];
        $equipmentLab->major_technologies_id = $request['major_technologies_id'];
        $equipmentLab->equipment_year = $request['equipment_year'];
        $equipmentLab->equipment_price = $request['equipment_price'];
        $equipmentLab->equipment_supplier = $request['equipment_supplier'];
        $equipmentLab->objective_usages_id = $request['objective_usages_id'];
        $equipmentLab->equipment_usages_id = $request['equipment_usages_id'];
        $equipmentLab->equipment_ability = $request['equipment_ability'];
        $equipmentLab->equipment_pic = $request['equipment_pic'];
        $equipmentLab->equipment_calibrations_id = $request['equipment_calibrations_id'];
        $equipmentLab->equipment_calibration_by = $request['equipment_calibration_by'];
        $equipmentLab->equipment_calibration_year = $request['equipment_calibration_year'];
        $equipmentLab->equipment_maintenances_id = $request['equipment_maintenances_id'];
        $equipmentLab->equipment_maintenance_budget = $request['equipment_maintenance_budget'];
        $equipmentLab->equipment_admin_name = $request['equipment_admin_name'];
        $equipmentLab->equipment_admin_phone = $request['equipment_admin_phone'];
        $equipmentLab->equipment_admin_email = $request['equipment_admin_email'];
        $equipmentLab->equipment_manuals_id = $request['equipment_manuals_id'];
        $equipmentLab->equipment_manual_name = $request['equipment_manual_name'];
        $equipmentLab->equipment_manual_locate = $request['equipment_manual_locate'];
        $equipmentLab->equipments_rent_id = $request['equipment_rent_id'];
        $equipmentLab->equipment_rent_fee = $request['equipment_rent_fee'];
        $equipmentLab->equipment_rent_detail = $request['equipment_rent_detail'];

        //dd($equipmentLab->all());
        $equipmentLab->update();
        return redirect("/equipmentLab/$equipmentLab->id");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EquipmentLab  $equipmentLab
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipmentLab $equipmentLab)
    {
        //
    }

    protected function validateEquipmentLab()
    {
        return request()->validate([
            'equipment_lab_id' =>'',
            'science_tool_id' =>'' ,
            'science_tool_other_name' =>'' ,
            'science_tool_other_abbr' =>'' ,
            'equipment_name_th' =>'' ,
            'equipment_brand' =>'' ,
            'equipment_model' =>'' ,
            'equipment_org_code' =>'' ,
            'equipment_year'=>'' ,
            'equipment_price'=>'' ,
            'equipment_supplier'=>'' ,
            'major_technologies_id'=>['required'] ,
            'major_technologies_other'=>'' ,
            'objective_usages_id' => ['required'],
            'equipment_usage_id'=>'' ,
            'equipment_ability'=>'' ,
            'equipment_pic'=>'' ,
            'equipment_calibrations_id'=>'' ,
            'equipment_calibration_by'=>'' ,
            'equipment_calibration_year'  =>'' ,
            'equipment_maintenance_id'    =>'' ,
            'equipment_maintenance_other' =>'' ,
            'equipment_maintenance_budget'=>'' ,
            'equipment_admin_name'=>'' ,
            'equipment_admin_phone'=>'' ,
            'equipment_admin_email'=>'' ,
            'equipment_manuals_id'=>'' ,
            'equipment_manual_name'=>'' ,
            'equipment_manual_locate'=>'' ,
            'equipments_rent_id'=>'' ,
            'equipment_rent_fee'=>'' ,
            'equipment_rent_detail'=>'' ,
        ]);
    }
}
