use nails_room;
-- INSERT INTO citas (id_cita,fecha_cita,hora_cita,id_servicio,id_cliente,id_empleado,cantidad_servicio,total)
-- VALUES (1,"2021-11-28","16:00",1,4,4,1,12000);
-- INSERT INTO servicios (id_servicio,nombre_servicio,precio_servicio)
-- VALUES (1,"manicure",12000);
Select id_cita, fecha_cita, hora_cita, nombre_servicio, nombre_cliente, nombre_empleado, total
from citas join servicios on citas.id_servicio=servicios.id_servicio
		   join clientes on citas.id_cliente=clientes.id_cliente
           join empleados on citas.id_empleado=empleados.id_empleado;

Call insert_customer(1,1214744283,"Juanito Alimania",3167384933);
Create view showStatsC
as
SELECT count(*) total_clientes FROM clientes;

select * from showStatsC;