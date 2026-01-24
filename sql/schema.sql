CREATE TYPE user_role AS ENUM (
    'Learner',
    'Instructor',
    'Admin'
);

CREATE TYPE brief_type AS ENUM (
    'Individuel',
    'Collectif'
);

CREATE TYPE mastery_level AS ENUM (
    'Imiter',
    'S_adapter',
    'Transposer'
);

CREATE TABLE classes (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    promotion_year INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(180) UNIQUE NOT NULL,
    password TEXT NOT NULL,
    role user_role NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    class_id INT,
    CONSTRAINT fk_user_class FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE CASCADE
);





CREATE TABLE class_instructors (
    class_id INT NOT NULL,
    instructor_id INT NOT NULL,
    PRIMARY KEY (class_id, instructor_id),
    CONSTRAINT fk_ct_class FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE CASCADE,
    CONSTRAINT fk_ct_instructor FOREIGN KEY (instructor_id) REFERENCES users(id) ON DELETE CASCADE
);



CREATE TABLE sprints (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    duration_days INT NOT NULL,
    sprint_order INT NOT NULL,
);


CREATE TABLE class_sprints (
    class_id INT NOT NULL,
    sprint_id INT NOT NULL,

    sprint_order INT NOT NULL,

    PRIMARY KEY (class_id, sprint_id),

    CONSTRAINT fk_cs_class
        FOREIGN KEY (class_id)
        REFERENCES classes(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_cs_sprint
        FOREIGN KEY (sprint_id)
        REFERENCES sprints(id)
        ON DELETE CASCADE,

    UNIQUE (class_id, sprint_order)
);



CREATE TABLE briefs (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    start_date TIMESTAMP NOT NULL,
    end_date TIMESTAMP NOT NULL,
    type brief_type NOT NULL,
    sprint_id INT NOT NULL,
    instructor_id INT NOT NULL,
    CONSTRAINT fk_brief_instructor FOREIGN KEY (instructor_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT fk_brief_sprint FOREIGN KEY (sprint_id) REFERENCES sprints(id) ON DELETE CASCADE
);


CREATE TABLE competences (
    id SERIAL PRIMARY KEY,
    code VARCHAR(10) UNIQUE NOT NULL,
    label VARCHAR(255) NOT NULL
);



CREATE TABLE brief_competence (
    brief_id INT NOT NULL,
    competence_id INT NOT NULL, 
    CONSTRAINT fk_bc_brief FOREIGN KEY (brief_id) REFERENCES briefs(id) ON DELETE CASCADE,
    CONSTRAINT fk_bc_competence FOREIGN KEY (competence_id) REFERENCES competences(id) ON DELETE CASCADE,
    PRIMARY KEY (brief_id, competence_id)
);



CREATE TABLE debriefings (
    id SERIAL PRIMARY KEY,
    brief_id INT NOT NULL,
    learner_id INT NOT NULL,
    instructor_id INT NOT NULL,
    comment TEXT,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_debrief_brief FOREIGN KEY (brief_id) REFERENCES briefs(id) on DELETE CASCADE,
    CONSTRAINT fk_debrief_learner FOREIGN KEY (learner_id) REFERENCES users(id) on delete CASCADE,
    CONSTRAINT fk_debrief_instructor FOREIGN KEY (instructor_id) REFERENCES users(id) on delete cascade,
    UNIQUE (brief_id, learner_id)
);

CREATE TABLE debriefing_competence (
    debriefing_id INT NOT NULL,
    competence_id INT NOT NULL,
    mastery mastery_level NOT NULL,

    CONSTRAINT fk_dc_debriefing FOREIGN KEY (debriefing_id) REFERENCES debriefings(id) ON DELETE CASCADE,
    CONSTRAINT fk_dc_competence FOREIGN KEY (competence_id) REFERENCES competences(id) ON DELETE CASCADE,
    PRIMARY KEY (debriefing_id, competence_id)
);

