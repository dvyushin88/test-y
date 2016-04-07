######################### Third part #################################
SELECT t1.`type`,t1.`value` FROM data t1
JOIN (SELECT `type`, max(`date`) maxdate FROM data GROUP BY `type`) t2
  ON t1.`type` = t2.`type` AND t1.`date` = t2.maxdate;
######################################################################