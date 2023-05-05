 //  bar chart for weight
         $labelerCheckup = ChildMedicalData::select('checkup_followup')
                    //->groupBy(\DB::raw("strftime('%d',checkup_followup)")) //un comment if sqlite
                    ->groupBy('checkup_followup') //uncomment if mysql
                    ->orderBy('checkup_followup', 'ASC')
                    ->get(); 

        $cusLabelPerMonth = []; //create an empty array to store custom label
        foreach($labelerCheckup as $weight)
        {
             $month =   Carbon::parse($weight->checkup_followup)->format('M-d-Y');
             array_push($cusLabelPerMonth,$month);
        }

        $chartPieWeight = new ChildCharts();    //Extends Charts/UserLineChar/ class     
        $chartPieWeight->labels($cusLabelPerMonth);
        $childWeight = ChildMedicalData::select('weight')
                    ->where('child_id', '=', $childId->id)
                    //->groupBy(\DB::raw("strftime('%d',checkup_followup)")) //uncomment if sqlite
                    //->groupBy('checkup_followup') //uncomment if mysql
                    ->pluck('weight');
        $chartPieWeight->dataset('Child Weight', 'bar',$childWeight)
        ->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ])
        ->color(collect(['#7d5fff','#32ff7e', '#ff4d4d','#8C1C51','#48DBCC','#D6E785']))
        ->backgroundColor(collect(['#7158e2','#3ae374', '#ff3838','#8C1C51','#48DBCC','#D6E785']));
        //end of bar chart

        //  line chart for remarks
        $labelerRemarks = ChildMedicalData::select('remarks')
                    ->groupBy('remarks')
                    // ->orderBy('checkup_followup', 'ASC')
                    ->get(); 

        $cusLabelPerRemarks = []; //create an empty array to store custom label
        foreach($labelerRemarks as $child)
        {
            //  $month =   Carbon::parse($child->checkup_followup)->format('M-d-Y');
              array_push($cusLabelPerRemarks,$child->remarks);
            //  array_push($cusLabelPerRemarks,$month);
        }

        $chartPieRemarks = new ChildCharts();    //Extends Charts/UserLineChar/ class     
        $chartPieRemarks->labels($cusLabelPerRemarks); //array contains of custom of labels

        $childRemarks = ChildMedicalData::select(\DB::raw("COUNT(remarks) as count"))
            ->where('child_id', '=', $childId->id)
            ->groupBy('remarks') //uncomment if using mysql
            //->groupBy(\DB::raw('remarks')) //uncomment if using sqlite                     
            ->pluck('count');  

        $chartPieRemarks->dataset('Child BMI', 'pie',$childRemarks)
        ->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ])
        ->color(collect(['#7d5fff','#32ff7e', '#ff4d4d','#8C1C51','#48DBCC','#D6E785']))
        ->backgroundColor(collect(['#7158e2','#3ae374', '#ff3838','#8C1C51','#48DBCC','#D6E785']));
        //end of pi chart
        

          //medical record
        $medrecord = ChildMedicalData::select("*")
            ->where("child_id",'=',$childId->id)
            ->get();