<?php 
    /**
     * File that contains the declarations of ours method
     */

    /**
     * Init a list of employe depending of count number
     *@param int $count
     * @return array<array<string,string,string,float>>
     */
    function initList($count = 5) :Array 
    {
        // declare my initial employe array
        $employees = [];
        
        for($i=0;$i<$count;$i++){
            $employees[] = [
                "fullName" => uniqueString("fullname"),
                "employer"=>uniqueString("employer"),
                "location"=>uniqueString("location"),
                "salary"=>uniqueFloat()
            ];
        }

        return $employees;
    }


    /**
     * generate an unique string with a prefix
     *
     * @param [type] $prefix
     * @return string
     */
    function uniqueString(String $prefix):String
    {
        return uniqid($prefix,true);
    }

    /**
     * generate an unique float
     *
     * @return float
     */
    function uniqueFloat(): Float{
        $first = rand(100,100000);
        $second = time();
        return floatval($first.'.'.$second);
    }

    /**
     * function that lists and displays all employees living in a specific location
     *
     * @param array $employees
     * @param String $location
     * @return void
     */
    function displayByLocation(array $employees,String $location):void{
        // list matching employe
        $filterEmployes = array_filter($employees,function($employe) use ($location){
            if($employe["location"] === $location ){
                return true;
            }
        });

        // display employes
        foreach($filterEmployes as $item){
            displayEmploye($item);
        }

    }

    /**
     *  function that lists all employees who have a salary higher than a specific amount
     *
     * @param array $employees
     * @param float $salary
     * @return array
     */
    function listBySalary(array $employees,float $salary):array{
        // list matching employe
        $filterEmployes = array_filter($employees,function($employe) use ($salary){
            if($employe["salary"] >= $salary ){
                return true;
            }
        });
        return $filterEmployes;
    }

    /**
     *  function that finds the worker with the highest salary and prints the information about them
     *
     * @param array $employees
     * @return void
     */
    function employeWithHighestSalary(array $employees){
        $highSalary = 0;
        $indexEmploye = 0; 
        $employe = null;
        foreach($employees as $index => $employeItem){
            if($employeItem["salary"]>$highSalary){
                $highSalary = $employeItem["salary"];
                $indexEmploye = $index;
            }
        }
        $employe = $employees[$indexEmploye];
        // display employe
        displayEmploye($employe);
    }

    /**
     * function that finds the average salary of all workers
     *
     * @param array $employees
     * @return float
     */
    function salaryAverage(array $employees):float{
        $count = count($employees);
        $sumSalary = 0.0;
        foreach($employees as $employeItem){
            $sumSalary+= $employeItem["salary"];
        }
        return $sumSalary / $count;
    }

    /**
 * Display an employee
 *
 * @param Array $employe
 * @return void
 */
function displayEmploye(array $employe): void
{
    foreach ($employe as $key => $value) {
        print($key . ":" . $value);
        print("<br>");
    }
}
