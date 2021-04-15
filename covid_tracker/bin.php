SELECT T1.Department_ID, T3.Department_Name,COUNT(T1.Langara_ID) AS Number_Of_Infected_Persons
   FROM(
    ((SELECT * FROM Student_In_Department) UNION (SELECT * FROM Instructor_In_Department)) AS T1
   ,
   (SELECT Department_ID, Department_Name FROM Department) AS T3
  )
  WHERE T1.Department_ID=T3.Department_ID
  GROUP BY T1.Department_ID,T3.Department_Name,T3.Department_ID



  SELECT MAX(Number_Of_Infected_Persons)
FROM(
(SELECT T1.Department_ID, T3.Department_Name,COUNT(T1.Langara_ID) AS Number_Of_Infected_Persons
   FROM(
    ((SELECT * FROM Student_In_Department) UNION (SELECT * FROM Instructor_In_Department)) AS T1
   ,
   (SELECT Department_ID, Department_Name FROM Department) AS T3
  )
  WHERE T1.Department_ID=T3.Department_ID
  GROUP BY T1.Department_ID,T3.Department_Name,T3.Department_ID) AS T2
)

