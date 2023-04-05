<?php

use App\Item;
use App\CountingUnit;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemcodesam= "00";
        $itemran=array("Abacavir","dolutegravir" , "lamivudine", "Acyclovir","Alemtuzumab","Alendronate","Allopurinol","Amifostine","Amikacin","Aminocaproic Acid","Amitriptyline","Amlodipine","Amoxicillin","clavulanic acid","Amphotericin B","Ampicillin","Anti-Inhibitor" ,"Coagulant Complex (FEIBA)","Anti-thymocyte globulin","Aprepitant","Asparaginase","Atazanavir (Reyataz)","Atenolol","Atovaquone","Azithromycin","Baclofen","Bleomycin","Bortezomib","Bosentan","Busulfan");
        for($i=0;$i<20;$i++){

         Item::create([
            'item_code' => $itemcodesam+$i,
            'item_name' => $itemran[array_rand($itemran)],
            'created_by' => "John Employee",
            'photo_path' => "medicinedefault.jpg",
            'category_id' => rand(1,3),
            'sub_category_id' => rand(1,3),
            'brand_id'=>rand(1,2),
            'type_id'=>1,
            'model'=>"M-001",
        ]);
        };

        $coutram=["Crizotinib","Cyclobenzaprine","Cyclophosphamide","Cyclosporine","Cyproheptadine","Cytarabine","Dacarbazine","Dactinomycin","Dapsone","Darunavir (Prezista)","Dasatinib","Daunorubicin","Deferasirox (Exjade)","Desmopressin","Dexamethasone","Diclofenac","Didanosine","Dinutuximab","Dobutamine","Dopamine","Dornase alfa","Doxorubicin","Dronabinol","Efavirenz","Eltrombopag","Elvitegravir" , "cobicistat" , "emtricitabine", "tenofovir","Emicizumab","Emtricitabine","Enalapril","Enoxaparin","Erlotinib","Erythromycin","Erythropoietin","Etonogestrel", "Etoposide","Etravirine","Factor IX complex","Famciclovir","Famotidine","Fidaxomicin","Fluconazole","Fludarabine","Fluorouracil","Foscarnet","Gabapentin","Ganciclovir","Gefitinib","Gemcitabine","Granisetron","Hydralazine","Hydrocortisone","Hydromorphone","Hydroxyurea","Ifosfamide","Imatinib","Irinotecan","Isotretinoin","Itraconazole","Ketoconazole","L-glutamine","Labetalol","Lamivudine","Levothyroxine","Linezolid","Lomustine","Lorazepam","Lorlatinib","Magnesium","Maraviroc","Megestrol acetate","Meloxicam","Melphalan","Meperidine","Mercaptopurine","Meropenem","Mesna","Methotrexate","Methylphenidate","Metronidazole","Micafungin","Mitotane","Mitoxantrone","Modafinil",'Morphine',"Muromonab – CD3","Mycophenolate mofetil","Nelarabine","Nelfinavir","Neuromuscular blockers","Nevirapine","Norepinephrine","Omeprazole",'Ondansetron',"Oxycodone","Paclitaxel","PEGaspargase","Pegfilgrastim","Pemetrexed","Penicillin VK","Pentamidine" ,"Phenobarbital","Phenytoin","Phosphorus","Posaconazole","Potassium","Prednisone","Probenecid","Procarbazine","Promethazine","Promethazine topical gel","Propoxyphene","Raltegravir","Ranitidine","Rasburicase","Regorafenib","Rilpivirine","Ritonavir","Rituximab","Rivaroxaban","Ruxolitinib","Saquinavir","Sirolimus","Sorafenib","Stavudine","Sucralfate","Sugammadex","Sunitinib","Tacrolimus","Temozolomide","Teniposide","Thioguanine","Tobramycin","Trimethoprim", "Valproic acid","Vancomycin","Vincristine","Voriconazole","Vorinostat","Voxelotor","Warfa"];
        for($i=0;$i<100;$i++){

        CountingUnit::create([
            'unit_name' => $coutram[array_rand($coutram)],
            'reorder_quantity' => 4,
            'normal_sale_price' => rand(3000,8000),
            'stock_qty' => rand(30,80),
            'purchase_price' => rand(2000,6000),
            'item_id' => rand(1,20),
        ]);
    }


    }

}
