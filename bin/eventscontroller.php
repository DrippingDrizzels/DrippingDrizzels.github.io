<?php

require_once ('../libs/constants.php');
require_once ('../libs/dboperations.php');
class eventscontroller {
    public function getCurrentEvents() {
      $sql="";
      $result=NULL;
      $output=array();
      $response=NULL;
      $sql="";
        $sql = $sql . "SELECT events.id as id, events.name as eventName, events.date as eventDate,";
        $sql = $sql . " events.description as eventDescription, events.image as eventImage FROM events";
        try {
          $result=select($sql);
          if(sizeof($result)>0){
            foreach ( $result as $item ) {
              //add logic to filter only current & upcoming events
                $id = $item ["id"];
                $eventName = $item ["eventName"];
                $eventDate = $item ["eventDate"];
                $eventDescription = $item ["eventDescription"];
                $eventImage = $item ["eventImage"];
                $eventDetails = array ();
                $eventDetails ["id"] = intval ( $id );
                $eventDetails ["eventName"] = $eventName;
                $eventDetails ["eventDate"] = $eventDate;
                $eventDetails["eventDescription"] = $eventDescription;
                $eventDetails ["eventImage"] = $eventImage;
                array_push ( $output, $eventDetails );
            }
          }

        } catch ( Exception $e ) {
            throw new Exception ( $e->getMessage () );
        }
        return $output;
      }

      public function saveEvent($data) {
    		try
    		{
    			$eventid=$data['id'];
    			$eventdata=$data;
    			if(((int)$eventdata['id']) <= 0)
    			{
    				unset($eventdata['id']);
    			}
          // if(isset($data['description'])){
          //     $description = $data['description'];
          //     unset($eventdata ['description']);
          // }
          // if(isset($data['name']))
          // {
          //     $name = $data['name'];
          //     unset($eventdata['name']);
          // }
          // if(isset($data['image']))
          // {
          //     $image = $data['image'];
          //     unset($eventdata['image']);
          // }
          // if(isset($data['date']))
          // {
          //     $date = $data['date'];
          //     unset($eventdata['date']);
          // }
          $tempid = $this->insertEvent($eventdata);
          return $tempid;
        }
        catch(Exception $e)
        {
            return array("error"=>$e->getMessage());
        }
      }
      public function insertEvent($event) {
        try
        {
        	DB::startTransaction();
        	DB::insertUpdate("events",$event);
        	$id=DB::insertId();
        	DB::commit();
        }
        catch(Exception $e)
        {
        	DB::rollback();

        	throw new Exception($e->getMessage());
        }
        return $id;
    }

}

?>
