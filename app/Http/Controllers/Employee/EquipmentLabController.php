<?php

namespace App\Http\Controllers\Employee;
use App\Helpers\LogActivity;
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
    
        $allEquipmentLab = EquipmentLab::paginate(5);
        $allScienceTool = ScienceTool::where('science_tool_status','A')->get();
        //$allEquipments = Equipment::all();
        //$allEstate = IndustrialEstate::all();
        //dd($allEquipmentLab->all());
        //return $allOrgData;
        //return $allEquipmentLab;
        $data = [
            'scienceTools' => $allScienceTool,
            'equipmentLabs' => $allEquipmentLab,
        ];
        return view('employee.equipmentLab.index')->with($data);
        // /return view('employee.equipmentLab.index',['showEquipmentLab'=>$allEquipmentLab]);
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
        $equipmentLab->major_technologies_other = $request['major_technology_other'];
        $equipmentLab->equipment_year = $request['equipment_year'];
        $equipmentLab->equipment_price = $request['equipment_price'];
        $equipmentLab->equipment_supplier = $request['equipment_supplier'];
        //$equipmentLab->major_technologies_id = $request['major_technologies_id'];
        //$equipmentLab->objective_usages_id = $request['objective_usages_id'];
        $equipmentLab->equipment_usage_id = $request['equipment_usage_id'];
        $equipmentLab->equipment_ability = $request['equipment_ability'];
        // $equipmentLab->equipment_pic = $request->file('equipment_pic')->store('upload');
        // $equipmentLab->equipment_pic = $request->file('equipment_pic') ? $request->image('equipment_pic')->store('images/') : null;
        if ($request->hasFile('equipment_pic')) {
            $filenamewithExt = $request->file('equipment_pic')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('equipment_pic')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('equipment_pic')->storeAs('images/',$fileNameToStore );
        } else {
            # code...
        }
        
        // $equipmentLab->equipment_pic = $fileNameToStore;
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
        
        //$equipmentLab->equipment_pic = $request['equipment_pic']->image->store('images','public');

        // dd($equipmentLab->all());
        $equipmentLab->save();
        $equipmentLab->majorTechnologies()->sync($request->major_technologies_id, false);
        $equipmentLab->objectiveUsages()->sync($request->objective_usages_id, false);

        // create log activity
        LogActivity::addToLog('Add equipment to lab : " ' . $equipmentLab->equipment_name_th . ' to ' .$lab->organization_id . ' " successfully.');

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
        $allEquipmentLab = EquipmentLab::findOrFail($equipmentLab->id);
        $allScienceTool = ScienceTool::where('science_tool_status','A')->get();
        $allMajorTechnology = MajorTechnology::where('major_tech_status','A')->get();
        $allMajorTechnologyItem = [];
        foreach ($allEquipmentLab->majorTechnologies as $item) {
            $allMajorTechnologyItem[] = $item->id;
        }
        // return $allMajorTechnologyItem;
        $allTechnicalEquipment = TechnicalEquipment::where('technical_equipment_status','A')->get();
        $allObjectiveUsage = ObjectiveUsage::where('obj_usage_status','A')->get();
        $allObjectiveUsageItem = [];
        foreach ($allEquipmentLab->objectiveUsages as $item) {
            $allObjectiveUsageItem[] = $item->id;
        }
        $allEquipmentUsage = EquipmentUsage::where('equipment_usage_status','A')->get();
        $allEquipmentCalibration = EquipmentCalibration::where('equipment_calibration_status','A')->get();
        $allEquipmentMaintenance = EquipmentMaintenance::where('equipment_maintenance_status','A')->get();
        $allEquipmentManual = EquipmentManual::where('equipment_manual_status','A')->get();
        $allEquipmentRent = EquipmentRent::where('equipment_rent_status','A')->get();
        $data = [
            'equipmentLabs' => $allEquipmentLab,
            'scienceTools' => $allScienceTool,
            'majorTechnologies' => $allMajorTechnology,
            'majorTechnologyItem' => $allMajorTechnologyItem,
            'technicalEquipments' => $allTechnicalEquipment,
            'objectiveUsages' => $allObjectiveUsage,
            'objectiveUsageItem' => $allObjectiveUsageItem,
            'equipmentUsages' => $allEquipmentUsage,
            'equipmentCalibrations' => $allEquipmentCalibration,
            'equipmentMaintenances' => $allEquipmentMaintenance,
            'equipmentManuals' => $allEquipmentManual,
            'equipmentRents' => $allEquipmentRent,
        ];
        //return $data;
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
        // dd($request->all());
        //Validate Check
        //$this->validateEquipmentLab();

        $equipmentLab = EquipmentLab::find($equipmentLab->id);
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
        $equipmentLab->major_technologies_other = $request['major_technology_other'];
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
        
        $equipmentLab->save();
        $equipmentLab->majorTechnologies()->sync($request->major_technologies_id);
        $equipmentLab->objectiveUsages()->sync($request->objective_usages_id);
        return redirect()->route('equipmentLab.show', $equipmentLab->id);
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
            'equipment_lab_id' =>'required',
            'science_tool_id' =>['required'] ,
            'science_tool_other_name' =>'' ,
            'science_tool_other_abbr' =>'' ,
            'equipment_name_th' =>'required' ,
            'equipment_brand' =>'' ,
            'equipment_model' =>'' ,
            'equipment_org_code' =>'' ,
            'equipment_year'=>'' ,
            'equipment_price'=>'' ,
            'equipment_supplier'=>'' ,
            'major_technologies_id'=>['required'] ,
            'major_technologies_other'=>'' ,
            'objective_usages_id' => ['required'],
            'equipment_usage_id'=>'required' ,
            'equipment_ability'=>'' ,
            'equipment_pic'=>'' ,
            'equipment_calibrations_id'=>'' ,
            'equipment_calibration_by'=>'' ,
            'equipment_calibration_year'  =>'' ,
            'equipment_maintenance_id'    =>'required' ,
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
