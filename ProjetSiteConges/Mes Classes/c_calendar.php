<?php
require_once 'c_CalendrierConges.php';
class c_calendar {
    /**
     * Constructor
     */
    public function __construct($pcollEtatJourDuVisiteur){
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
        $this->collEtatJourDuVisiteur = $pcollEtatJourDuVisiteur;
    }

    /********************* PROPERTY ********************/
    private $dayLabels = array("Lun","Mar","Mer","Jeu","Ven","Sam","Dim");

    private $currentYear=0;

    private $currentMonth=0;

    private $currentDay=0;

    private $currentDate=null;

    private $daysInMonth=0;

    private $naviHref= null;

    /********************* PUBLIC **********************/

    public $collEtatJourDuVisiteur;

    public function show() {

        $year  = null;

        $month = null;

        if(null==$year&&isset($_GET['year'])){

            $year = $_GET['year'];

        }else if(null==$year){

            $year = date("Y",time());

        }

        if(null==$month&&isset($_GET['month'])){

            $month = $_GET['month'];

        }else if(null==$month){

            $month = date("m",time());

        }

        $this->currentYear=$year;

        $this->currentMonth=$month;

        $this->daysInMonth=$this->_daysInMonth($month,$year);

        $content=
                        '<div class="box">'.
                        $this->_createNavi().
                        '</div>'.
                        '<div class="box-content">'.
                                '<ul class="label">'.$this->_createLabels().'</ul>';
                                $content.='<div class="clear"></div>';
                                $content.='<ul class="dates">';

                                $weeksInMonth = $this->_weeksInMonth($month,$year);
                                // Create weeks in a month
                                for( $i=0; $i<$weeksInMonth; $i++ ){

                                    //Create days in a week
                                    for($j=1;$j<=7;$j++){
                                        $content.=$this->_showDay($i*7+$j);
                                    }
                                }

                                $content.='</ul>';

                                $content.='<div class="clear"></div>';

                        $content.='</div>';

        $content.='</div>';
        return $content;
    }

    /********************* PRIVATE **********************/
    /**
    * create the li element for ul
    */
    private function _showDay($cellNumber){

        if($this->currentDay==0){

            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));

            if(intval($cellNumber) == intval($firstDayOfTheWeek)){

                $this->currentDay=1;

            }
        }

        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){

            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));

            $cellContent = $this->currentDay;

            $this->currentDay++;

        }else{

            $this->currentDate =null;

            $cellContent=null;
        }
        $ClassEtatJour = "";
        if ($this->currentDate != '' && empty($this->collEtatJourDuVisiteur[$this->currentDate])==false)
        {
          $EtatJour = $this->collEtatJourDuVisiteur[$this->currentDate]->c_oetat->c_ID;
          if ($this->collEtatJourDuVisiteur[$this->currentDate]->c_oetat->c_ID == "WE")
          {
            $ClassEtatJour = "WE";
          }
          elseif ($this->collEtatJourDuVisiteur[$this->currentDate]->c_oetat->c_ID == "JF")
          {
            $ClassEtatJour = "JF";
          }
          elseif ($this->collEtatJourDuVisiteur[$this->currentDate]->c_oetat->c_ID == "CMA")
          {
            $ClassEtatJour = "CMA";
          }
          elseif ($this->collEtatJourDuVisiteur[$this->currentDate]->c_oetat->c_ID != "JF" && $this->collEtatJourDuVisiteur[$this->currentDate]->c_oetat->c_ID != "WE" && $this->collEtatJourDuVisiteur[$this->currentDate]->c_oetat->c_ID != "JTR")
          {
            $ClassEtatJour = "JC";
          }
        }
        if (empty($EtatJour)==false)
        {
          $AffichageEtat ='<span>'.$EtatJour.'</span>';
        }
        else
        {
          $AffichageEtat = "";
        }
        return ' <li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).($cellContent==null?'mask':'').' '.$ClassEtatJour.'">'.$cellContent.$AffichageEtat.'</li>';
    }

    /**
    * create navigation
    */
    private function _createNavi(){

        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;

        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;

        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;

        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;

        if($this->currentMonth == '01')
{
	$MoisenCours = '<p class="MoisenCours">Janvier '.$this->currentYear.'</p>';
}
else if($this->currentMonth == '02')
{
	$MoisenCours = '<p class="MoisenCours">Fevrier '.$this->currentYear.'</p>';
}
else if($this->currentMonth == '03')
{
	$MoisenCours = '<p class="MoisenCours">Mars '.$this->currentYear.'</p>';
}
else if($this->currentMonth == '04')
{
	$MoisenCours = '<p class="MoisenCours">Avril '.$this->currentYear.'</p>';
}
else if($this->currentMonth == '05')
{
	$MoisenCours = '<p class="MoisenCours">Mai '.$this->currentYear.'</p>';
}
else if($this->currentMonth == '06')
{
	$MoisenCours = '<p class="MoisenCours">Juin '.$this->currentYear.'</p>';
}
else if($this->currentMonth == '07')
{
	$MoisenCours = '<p class="MoisenCours">Juillet '.$this->currentYear.'</p>';
}
else if($this->currentMonth == '08')
{
	$MoisenCours = '<p class="MoisenCours">Aout '.$this->currentYear.'</p>';
}
else if($this->currentMonth == '09')
{
	$MoisenCours = '<p class="MoisenCours">Septembre '.$this->currentYear.'</p>';
}
else if($this->currentMonth == '10')
{
	$MoisenCours = '<p class="MoisenCours">Octobre '.$this->currentYear.'</p>';
}
else if($this->currentMonth == '11')
{
	$MoisenCours = '<p class="MoisenCours">Novembre '.$this->currentYear.'</p>';
}
else if($this->currentMonth == '12')
{
	$MoisenCours = '<p class="MoisenCours">Decembre '.$this->currentYear.'</p>';
}
        return
            '<div class="header">'.
            '<form action="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'" method="post" ><input id="datecache" name="datecache"  type="hidden"><input type="submit" value="Prec" class="btnPrev"></form>'.
                /**'<a class="prev" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">Prec</a>'.*/
                    '<span class="title">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.$MoisenCours. /** creer condition pour affichage mois  */
                /**'<a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">Suiv</a>'.*/
                '<form action="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'" method="post" ><input id="datecachesuiv" name="datecachesuiv" type="hidden" ><input type="submit" value="Suiv" class="btnSuiv"></form>'.
            '</div>';
    }

    /**
    * create calendar week labels
    */
    private function _createLabels(){

        $content='';

        foreach($this->dayLabels as $index=>$label){

            $content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';

        }

        return $content;
    }
    /**
    * calculate number of weeks in a particular month
    */
    private function _weeksInMonth($month=null,$year=null){

        if( null==($year) ) {
            $year =  date("Y",time());
        }

        if(null==($month)) {
            $month = date("m",time());
        }

        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);

        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);

        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));

        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));

        if($monthEndingDay<$monthStartDay){

            $numOfweeks++;

        }

        return $numOfweeks;
    }

    /**
    * calculate number of days in a particular month
    */
    private function _daysInMonth($month=null,$year=null){

        if(null==($year))
            $year =  date("Y",time());

        if(null==($month))
            $month = date("m",time());

        return date('t',strtotime($year.'-'.$month.'-01'));
    }

}
