drop database if exists futbol;
create database futbol;
use futbol;

create table equipos(
	id int primary key auto_increment,
	nombre varchar(100) unique not null,
    cp int
)engine innodb;
insert into equipos values
(default,'Moralo', 10300),
(default,'Talayuela', 10310),
(default,'Jaraiz', 10400),
(default,'Peraleda', 10335);

create table usuarios(
	id int primary key auto_increment,
	dni varchar(9) unique not null,
    nombre varchar(100) not null,
    password blob not null,
    perfil enum('J','A','F') not null,
    id_equipo int null,
    foreign key(id_equipo) references equipos(id)
    on delete restrict on update cascade
)engine innodb;
insert into usuarios values (null,'00000000Z','Federación',sha2('admin',512),'F',null );
create table partidos(
	id int primary key auto_increment,
    fecha datetime not null,
    id_equipoL int not null,
    id_equipoV int not null,
    foreign key(id_equipoL) references equipos(id)
    on delete restrict on update cascade,
    foreign key(id_equipoV) references equipos(id)
    on delete restrict on update cascade,
    golesEL int not null default 0,
    golesEV int not null default 0,
    finalizado boolean not null default false
)engine innodb;

create table colegiados(
	id_partido int not null,
    id_arbitro int not null,
    primary key(id_partido, id_arbitro),
    foreign key(id_partido) references partidos(id)
    on delete restrict on update cascade,
    foreign key(id_arbitro) references usuarios(id)
    on delete restrict on update cascade
)engine innodb;

delimiter //
create procedure estadisticaJugador(jugador int)
begin
	declare partidosJugadosEL, partidosGanadosEL, golesFavorEL, golesContraEL int;
    declare partidosJugadosEV, partidosGanadosEV, golesFavorEV, golesContraEV int;
    declare partidosEmpatados int;
    
    -- Calculos equipo como local
    select count(*), ifnull(sum(golesEL),0), ifnull(sum(golesEV),0) into partidosJugadosEL, golesFavorEL, golesContraEL
		from partidos p join usuarios u on p.id_equipoL = u.id_equipo
        where u.id = jugador;
	-- Ganados como Equipo local
     select count(*)  into partidosGanadosEL
		from partidos p join usuarios u on p.id_equipoL = u.id_equipo
        where u.id = jugador and golesEL > golesEV;
	-- Empatados como Equipo local
     select count(*)  into partidosEmpatados
		from partidos p join usuarios u on p.id_equipoL = u.id_equipo
        where u.id = jugador and golesEL = golesEV;
        
	-- Calculos equipo como visitante
    select count(*), ifnull(sum(golesEV),0), ifnull(sum(golesEL),0) into partidosJugadosEV, golesFavorEV, golesContraEV
		from partidos p join usuarios u on p.id_equipoV = u.id_equipo
        where u.id = jugador;
	-- Ganados como Equipo local
     select count(*)  into partidosGanadosEV
		from partidos p join usuarios u on p.id_equipoL = u.id_equipo
        where u.id = jugador and golesEV > golesEL;
        
	-- Resultado
    select partidosJugadosEL+partidosJugadosEV as jugados, 
			partidosGanadosEL+partidosGanadosEV as ganados, 
            golesFavorEL+golesFavorEV as golesFavor, 
            golesContraEL + golesContraEV as golesContra,
            partidosEmpatados as empatados;
      
end//
-- Función para crear un equipo, devulve el id del equipo creado o -1 si error
create function crearEquipo(pNombre varchar(100), pCp int) returns int deterministic
begin
	declare idEquipo int;
	-- Comprobar si existe otro equipo con el mismo nombre
    select id into idEquipo from equipos where nombre = pNombre;
    if(idEquipo is not null) then
		return -1;
    else
		insert into equipos values (null, pNombre, pCp);
        return last_insert_id();
    end if;
end//

delimiter ;









