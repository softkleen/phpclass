create database dinamico85db;

use dinamico85db;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `email`, `login`, `senha`) VALUES
(1, 'Wellington Vieira', 'wellington@dev.senac', 'wellington', '123456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `titulo_banner` varchar(255) NOT NULL,
  `link_banner` varchar(255) NOT NULL,
  `img_banner` varchar(150) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `banner_ativo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(150) NOT NULL,
  `cat_ativo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `titulo_noticia` varchar(255) NOT NULL,
  `img_noticia` varchar(100) NOT NULL,
  `visita_noticia` int(11) NOT NULL,
  `data_noticia` date NOT NULL,
  `noticia_ativo` varchar(1) NOT NULL,
  `noticia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `titulo_post` varchar(250) NOT NULL,
  `descricao_post` text NOT NULL,
  `img_post` varchar(200) NOT NULL,
  `visitas` int(11) NOT NULL,
  `data_post` date NOT NULL,
  `post_ativo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;


delimiter |
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_adm_insert`(
_nome varchar(200), 
_email varchar(200),
_login varchar(100), 
_senha varchar(100)
)
BEGIN
	insert into administrador (nome, email, login, senha)
    values (_nome, _email, _login, _senha);
    select * from administrador where id = (select @@identity);    
END
|

select * from noticias;
select * from categoria;
select * from administrador;
delete from administrador where id between 4 and 44;


call sp_adm_insert('Paulo Santos', 'paulo@senac.dev','paulo','321654');


create table if NOT exists usuario(
  id int not null AUTO_INCREMENT,
  nome varchar(50) not null,
  email varchar(50) not null,
  foto varchar(100) not null,
  PRIMARY KEY(id)
)DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

select * from usuario;


    PROCEDURE INSERT
        Delimiter $$

        create PROCEDURE sp_banner_insert
        (
        sptitulo varchar(255),
        splink varchar(255),
        spimg varchar(150),
        spalt varchar(255),
        spativo varchar(1))

        Begin
        insert into banner(titulo_banner,link_banner,img_banner,alt,banner_ativo) values(
        sptitulo,
        splink,
        spimg,
        spalt,
        spativo);
        select * from banner where id_banner = (select @@identity);
        END$$


   delimiter $$
    CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_categoria_insert`(
        _categoria varchar(150), 
        _cat_ativo varchar(1)
        )
        BEGIN
            insert into categoria (categoria, cat_ativo)
            values (_categoria, _cat_ativo);
            select * from categoria where id_categoria = (select @@identity);    
        END $$
        
        
            DELIMITER $$
        CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_post_insert`(
        _id_post int(11),
        _id_categoria int(11),
        _titulo_post varchar(250),
        _descricao_post text,
        _visitas int(11),
        _data_post date,
        post_ativo varchar(1)
        )
        BEGIN
        	insert into post (id_post, id_categoria, titulo_post, descricao_post, img_post, visitas, data_post, post_ativo)
            values (_id_post, _id_categoria, _titulo_post, _descricao_post ,_visitas, _data_post,post_ativo);
            select * from post where id = (select @@identity);    
        END
        
            delimiter $$
    CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_noticia_insert`(
     idCategoria  int(11),
     tituloNoticia varchar(255),
     imgNoticia varchar(100),
     visitaNoticia INT(11),
     dataNoticia DATE,
     noticiaAtivo varchar(1),
     noticia TEXT
    )
    BEGIN 
    	INSERT INTO noticias (id_categoria, titulo_noticia, img_noticia, visita_noticia, data_noticia, noticia_ativo, noticia) 
        VALUES (idCategoria, tituloNoticia, imgNoticia, visitaNoticia , dataNoticia, noticiaAtivo, noticia);
        SELECT * FROM noticias WHERE id_noticia = (Select @@identity);
    END $$
    
    
    create table if not exists usuario(
    id int not null auto_increment,
    nome varchar(50) not null,
    email varchar(50) not null,
    foto varchar(100) not null,
    primary key(id)
    );
    
    
    select * from usuario where id=1;