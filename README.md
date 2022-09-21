# check-in-tour
PHP System - Visitor Control in tourist spots


# Algumas Queries

### SELECT log_visitante_id,COUNT(*) AS qtd FROM log_visitas GROUP BY log_visitante_id;

### SELECT distinct(MONTH(log_data_entrada)) AS Current_Month, COUNT(*),log_visitante_id FROM log_visitas GROUP BY Current_Month,   log_visitante_id;

### SELECT MONTH(log_data_entrada), MONTHNAME(log_data_entrada), COUNT(*) FROM log_visitas GROUP BY 1;