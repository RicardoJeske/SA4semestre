-- -----------------------------------------------------
-- Data for table `sitap`.`tbl_fotos`
-- -----------------------------------------------------
START TRANSACTION;
USE `sitap`;
INSERT INTO `sitap`.`tbl_fotos` (`idtbl_fotos`, `foto`, `idartigo`) VALUES (1, 'http://lorempizza.com/i/714/300', 1);
INSERT INTO `sitap`.`tbl_fotos` (`idtbl_fotos`, `foto`, `idartigo`) VALUES (2, 'http://lorempizza.com/i/714/299', 1);
INSERT INTO `sitap`.`tbl_fotos` (`idtbl_fotos`, `foto`, `idartigo`) VALUES (3, 'https://baconmockup.com/714/300', 2);
INSERT INTO `sitap`.`tbl_fotos` (`idtbl_fotos`, `foto`, `idartigo`) VALUES (4, 'https://baconmockup.com/714/299', 2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `sitap`.`tbl_categorias`
-- -----------------------------------------------------
START TRANSACTION;
USE `sitap`;
INSERT INTO `sitap`.`tbl_categorias` (`idtbl_categorias`, `categoria`, `descricao`) VALUES (1, 'Pizza', 'Categoria que fala sobre pizzas.');
INSERT INTO `sitap`.`tbl_categorias` (`idtbl_categorias`, `categoria`, `descricao`) VALUES (2, 'Bacon', 'Categoria que fala sobre bacon');

COMMIT;

-- -----------------------------------------------------
-- Data for table `sitap`.`artigo_has_categoria`
-- -----------------------------------------------------
START TRANSACTION;
USE `sitap`;
INSERT INTO `sitap`.`artigo_has_categoria` (`tbl_artigo_idtbl_artigo`, `tbl_categorias_idtbl_categorias`) VALUES (1, 1);
INSERT INTO `sitap`.`artigo_has_categoria` (`tbl_artigo_idtbl_artigo`, `tbl_categorias_idtbl_categorias`) VALUES (2, 2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `sitap`.`tbl_comentario`
-- -----------------------------------------------------
START TRANSACTION;
USE `sitap`;
INSERT INTO `sitap`.`tbl_comentario` (`idcomentario`, `idusuario`, `idartigo`, `corpo`, `data`) VALUES (1, 0, 1, 'Xablau anonimo', '2014-10-27 16:48');
INSERT INTO `sitap`.`tbl_comentario` (`idcomentario`, `idusuario`, `idartigo`, `corpo`, `data`) VALUES (2, 3, 1, 'Xablau cacilda', '2014-10-28 16:48');

COMMIT;
