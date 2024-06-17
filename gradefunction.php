<?php
// Code for fetching results
$query = "SELECT t.StudentName, t.RollId, t.ClassId, t.ca, t.fe, SubjectId, tblsubjects.SubjectName, tblsubjects.SubjectCode, tblsubjects.semester, t.academicYear FROM (SELECT sts.StudentName, sts.RollId, sts.ClassId, tr.ca, tr.fe, SubjectId, tr.academicYear FROM tblstudents AS sts JOIN tblresult AS tr ON tr.StudentId = sts.StudentId) AS t JOIN tblsubjects ON tblsubjects.id = t.SubjectId WHERE (t.RollId = :rollid)";
$query = $dbh->prepare($query);
$query->bindParam(':rollid', $rollid, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 0;
$gpaCnt = 0;
$gpasem = 0;
$grade = "";
$gradepnt = 0;
$gpafinal = 0;
$gpaNo = 0;
$semesterStatus = 'Pass';

if ($countrow = $query->rowCount() > 0) {

    $groupedResults = array();

    // Group results by semester
    foreach ($results as $result) {
        $semester = $result->semester;

        // If the semester is not already a key in the array, create it
        if (!isset($groupedResults[$semester])) {
            $groupedResults[$semester] = array();
        }

        // Add the result to the corresponding semester
        $groupedResults[$semester][] = $result;
    }

    // Iterate through grouped results
    foreach ($groupedResults as $semester => $semesterResults) {
        // Iterate through results for the current semester
        foreach ($semesterResults as $result) {
            $grader = $result->fe + $result->ca;
            if ($grader >= 70 && $grader <= 100) {
                $grade = "A";
                $gradepnt = 4;
            } elseif ($grader >= 60 && $grader <= 69) {
                $grade = "B+";
                $gradepnt = 3.5;
            } elseif ($grader >= 50 && $grader <= 59) {
                $grade = "B";
                $gradepnt = 3;
            } elseif ($grader >= 40 && $grader <= 49) {
                $grade = "C";
                $gradepnt = 2.5;
            } elseif ($grader >= 30 && $grader <= 39) {
                $grade = "D";
                $gradepnt = 2;
            } elseif ($grader >= 0 && $grader <= 29) {
                $grade = "F";
                $gradepnt = 1;
            } else {
                // there cant be something else
            }
            $gpasem += $gradepnt;
            if ($result->ca < 24) {
                $semesterStatus = 'Retake';
            }

            if ($result->fe < 24 && $semesterStatus !== 'Retake') {
                $semesterStatus = 'Sup';
            }
            $cnt++;
            $gpaNo++;
            $gpaCnt = $gpasem;
        }

        if ($result->ca < 24) {

            $semesterStatus = 'Retake';
        }


        if ($result->fe < 24 && $semesterStatus !== 'Retake') {

            $semesterStatus = 'Sup';
        }
    }


    echo round($gpaCnt / $cnt, 2);
} else {

    // somwethng else to do

}
