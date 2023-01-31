<?php 
    require "function.php";
    
    // task 1
    $employes = initList(5);
    // task 2
    displayByLocation($employes,"Bulgamore");
    // task 3
    listBySalary($employes,15000.0);
    //  Task 4
    employeWithHighestSalary($employes);
    // task 5
    $avg = salaryAverage($employes);