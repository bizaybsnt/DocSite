<?php
include_once('constants.php');
class DATABASE
    {
        var $con;
        
        function __construct()
        {
            $this->con = "";
            $this->table = "";
            $this->data = "";
            $this->tableField = "*";
            $this->order = "";
            $this->cond = "";
            $this->limit = "";
            $this->sqlDebug = false;
        }
        
        
        function connect_db()
            {
                $this->con=mysqli_connect(HOST,USER,PASS) or die("server connection failed");
                mysqli_select_db($this->con,DATABASE) or die("Database connection failed!".mysqli_error($this->con));
                return $this->con;
                
            }
        function exec($sql)
            {
              $result=mysqli_query($this->con,$sql) or die("Wrong Query!".mysqli_error($this->con));
              if($result)
              {
                return $result;
              }  
            }
        function fetch_array($rs)
            {
              return mysqli_fetch_array($rs);  
            }
        function fetch_assoc($rs)
            {
                return mysqli_fetch_assoc($rs);
            }
        function fetch_object($rs)
            {
                return mysqli_fetch_object($rs);
            }
        function total_rows($rs)
            {
                return mysqli_num_rows($rs);
            }
        function insert_id()
            {
                return mysqli_insert_id();
            }
        function insert()
            {
                $query="INSERT INTO $this->table SET ";
                foreach($this->data as $k=>$v)
                {
                    $arr[$k]="$k='$v'";
                }
                if(count($arr)>0)
                {
                    $query.=implode(",",$arr);
                }
                else
                {
                    die("wrong query!");
                }
                $this->exec($query);
            }
        function update()
            {
                $query="UPDATE $this->table SET ";
                foreach($this->data as $k=>$v)
                {
                    $arr[$k]="$k='$v'";
                }
                if(count($arr)>0)
                {
                    $query.=implode(",",$arr);
                }
                foreach($this->cond as $k=>$v)
                {
                    $carr[$k]="$k='$v'";
                }
                if(count($carr)>0)
                {
                    $query.=" WHERE ".implode(" AND ",$carr);

                }
               
                $this->exec($query);
                
            }
        function delete()
            {
                $query="DELETE FROM $this->table WHERE ";
                foreach($this->data as $k=>$v)
                {
                    $arr[$k]="$k='$v'";
                }
                if(count($arr)>0)
                {
                    $query.=implode(" AND ",$arr);
                }
                else
                {
                    die("wrong query!");
                }
                $this->exec($query);
            }
            
          function select(  $single = FALSE, $pagination = FALSE, $path = NULL, $plimit = NULL, $pid = NULL, $search = NULL )
        {
            $query = "SELECT $this->tableField FROM $this->table ";
            $carr = array();
            if( $this-> cond != "" )
            {
            
                foreach( $this->cond as $k => $v )
                {
                    $carr[$k] = "$k = '$v'";
                }
                if( count( $carr ) > 0 )
                {
                    $cstr = " WHERE ".implode(" AND ", $carr );
                    $query .= $cstr;
                }
            }
            
            if( $search != NULL )
            {
                if( $this->cond == "" ){
                    $query .= " WHERE 1 = 1 ";   
                }
                $query .= " AND ".$search." ";
            }
            
            if( $this-> order != "" )
            {
                $query .= " ORDER BY ".$this->order." ";
            }
            
            if( $this-> limit != "" )
            {
                $query .= " LIMIT ".$this->limit." ";
            }
            if( $this->sqlDebug == TRUE )
            {
                return $query;
            }
            if( $single == TRUE )
            {
                //return single array
                $result = $this->exec( $query );
                return $this->fetch_assoc( $result );
            }
            
            else if( $pagination == TRUE )
            {
                $vals = $this->listings( $query, $path, $plimit,0,false, $pid );
                return $vals;
            }
            else{
                
                    return $this->exec( $query );
                
            }
            
            
            
            
        }

        function listings($sql, $path, $plimit=10000, $seo=0, $debug=false, $pid = 0) { 
    
        if($debug){
            die($sql);
        }
        else{
                $pagelist=$sql;
                $pageid =1; // Get the pid value    
                if(isset($_REQUEST['np'])) $pageid = $_REQUEST['np'];
                //$pageid = $pid;
                
                $Paging = new paging($seo);
                $Paging->conObj = $this->obj=new Database;
                $records = $Paging->myRecordCount($this->con,$pagelist); // count records
                $totalpage = $Paging->processPaging($plimit,$pageid);
                $resultlist = $Paging->startPaging($pagelist); // get records in the databse
                $links = $Paging->pageLinks($path.(isset($queryString)?"?".$queryString:"")); // 1234 links
                unset($Paging);
                
                $pagingValue = array($records,$resultlist,$links);
                return $pagingValue; 
            }
        }
     /* function select()
            {
                $query="SELECT $this->data FROM $this->table";
                foreach($this->data as $k=>$v)
                {
                    $arr[$k]="$k='$v'";
                }
                if(count($arr)>0)
                {
                    $query.=implode(" AND ",$arr);
                }
                else
                {
                    die("wrong query!");
                }
                $this->exec($query);
            }*/

     function redirect_to($url)
        {
            header("Location: ".$url);
            exit;
        }
     
     function flush_table()
        {
            $this->table = "";
            $this->data = array();
            $this->tableField = "*";
            $this->order = "";
            $this->cond = array();
            $this->limit = "";
        }
         function check( $field )
        {
            $field = strip_tags( $field );
            $field = trim( $field );
            $field = stripslashes( $field );
            $field = mysqli_real_escape_string( $this->con,  $field );
            return $field;
        }
        
        
            
    }




?>