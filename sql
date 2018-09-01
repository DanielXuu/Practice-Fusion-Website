"SELECT e.En_type, COUNT(*) FROM `encounter` e GROUP BY e.En_type";
SELECT a.Status, COUNT(*) FROM `appointment` a GROUP By a.Status
SELECT Appoint_type, COUNT(*) FROM `appointment` GROUP BY Appoint_type
SELECT Encounter, COUNT(*) FROM `appointment` GROUP BY Encounter
SELECT q.labname,count(*) FROM `flowsheet_content`fc LEFT JOIN `questlab` q on fc.level2 = q.idquestlab GROUP BY fc.level2
SELECT d.Sex,d.Age,f.Value FROM `flowsheet_content` f JOIN `demographic` d ON d.P_id = f.p_id WHERE f.level3 = "Hematocrit" AND f.flag = "Yes"
SELECT COUNT(*),COUNT(*)*100/(SELECT COUNT(*)FROM `flowsheet_content` f WHERE f.level3 = "Hematocrit") FROM `flowsheet_content` f JOIN `demographic` d ON d.P_id = f.p_id WHERE f.level3 = "Hematocrit" AND f.flag = "Yes"
SELECT COUNT(*),COUNT(*)*100/(SELECT COUNT(*) FROM `flowsheet_content` WHERE level3 LIKE "HbA1c") FROM `flowsheet_content` WHERE level3 LIKE "HbA1C"AND flag = "Yes"
"SELECT COUNT(*), COUNT(*)*100/(SELECT COUNT(*) FROM `vitals`WHERE V_name =\"BP\")FROM `vitals` WHERE V_name = \"BP\" AND V_value > 140 AND V_bpvalue < 90";
SELECT count(*),COUNT(*)*100/(SELECT COUNT(*) FROM `appointment`) FROM `appointment`,`patient` WHERE Encounter_date = "0000-00-00"
SELECT * FROM `appointment` WHERE P_id = 133
"SELECT p.id_sec,count(*) FROM `appointment`a JOIN `patient` p ON a.P_id = p.P_id WHERE `Status` = \"Cancelled\" GROUP BY p.id_sec";

"SELECT p.id_sec,a.A_date FROM `appointment`a JOIN `patient` p ON a.P_id = p.P_id WHERE `Status` LIKE \'%No%\'";
"SELECT * FROM `flowsheet_content`  WHERE `level3` LIKE \"%HIV%\" and `flag` = \"No\"";

SELECT temp.id_sec,f.level3 FROM (SELECT p.P_id,p.id_sec,year(CURRENT_TIMESTAMP) - year(d.Birth_date) as Age,d.Sex FROM `Patient` p, `demographic` d WHERE p.P_id = d.P_id AND 64 > Age > 30 AND d.Sex = 'F' ) as temp LEFT JOIN flowsheet_content f on temp.P_id = f.P_id WHERE level3 LIKE "%HIV%""
"SELECT p.id_sec, q.labname, fc.level3, fc.value,fc.value_non_number,fc.unit,fc.flag, fc.date FROM `flowsheet_content` fc,`patient` p,`questlab` q WHERE fc.p_id = p.p_id and fc.level2 = q.idquestlab and q.idquestlab = 'f7'limit 644";

"SELECT count(*), COUNT(*) /(SELECT COUNT(*)FROM `Patient` p, `demographic` d WHERE p.P_id = d.P_id AND d.Sex = \'F\' AND year(CURRENT_TIMESTAMP) - year(d.Birth_date) > 30 AND year(CURRENT_TIMESTAMP) - year(d.Birth_date) < 64 ) FROM(SELECT p.P_id,p.id_sec,year(CURRENT_TIMESTAMP) - year(d.Birth_date) as Age,d.Sex FROM `Patient` p, `demographic` d WHERE p.P_id = d.P_id AND d.Sex = \'F\' AND year(CURRENT_TIMESTAMP) - year(d.Birth_date) > 30 AND year(CURRENT_TIMESTAMP) - year(d.Birth_date) < 64 ) as temp LEFT JOIN flowsheet_content f ON f.P_id = temp.P_id WHERE f.level3 LIKE \"%HIV%\""$sql = "SELECT count

"SELECT p.prescrib_provider,COUNT(*) FROM `encounter` e JOIN `prescription` p ON p.p_id = e.p_id WHERE e.En_date = p.script_date GROUP BY p.prescrib_provider";

$str = $str + '<tr>';
$str = $str + '<td> '+val.id+'  </td>';
$str = $str + '<td> '+val.med+'-'+val.est+' </td>';
$str = $str + '<td> '+val.recorddate+'  </td>';
$str = $str + '<td> '+val.recordby+'  </td>';
$str = $str + '<td> '+val.sig+'  </td>';
$str = $str + '<td> '+val.diag+'  </td>';
$str = $str + '<td> '+val.start+'  </td>';
$str = $str + '<td> '+val.stop+'  </td>';
$str = $str + '<td> '+val.alert+'</td>';
$str = $str + '<td> '+val.com+'  </td>';
$str = $str + '</tr>';

<tr>
<th>PatientID</th>
<th>Medication</th>
<th>Record Date</th>
<th>Record By</th>
<th>Sig</th>
<th>Associated Diag</th>
<th>StartDate(Y/M/D)</th>
<th>StopDate(Y/M/D)</th>
<th>Alert</th>
<th>Comments</th>

</tr>
