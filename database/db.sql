drop table if exists options;
drop table if exists questions;
drop table if exists quizzes;

create table quizzes (
	id bigint primary key,
	name text,
	description text,
	category text,
	base_points bigint,
	start_date timestamp with time zone,
	end_date timestamp with time zone,
	is_active boolean,
	already_answered boolean
);

create table questions (
	id bigint primary key,
	text text,
	type text,
	quiz bigint,
	foreign key (quiz) references quizzes(id)
	on delete cascade on update cascade
);

create table options (
	id bigint primary key,
	text text,
	value text,
	question bigint,
	foreign key (question) references questions(id)
	on delete cascade on update cascade
);