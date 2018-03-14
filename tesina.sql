-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2018 alle 09:20
-- Versione del server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tesina`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articoli`
--

CREATE TABLE IF NOT EXISTS `articoli` (
  `id_pagine` int(11) NOT NULL,
  `testo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `articoli`
--

INSERT INTO `articoli` (`id_pagine`, `testo`) VALUES
(1, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur? [33] At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet, ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(2, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur? [33] At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet, ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(3, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur? [33] At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet, ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(4, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur? [33] At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet, ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.');

-- --------------------------------------------------------

--
-- Struttura della tabella `clown`
--

CREATE TABLE IF NOT EXISTS `clown` (
  `nome_clown` varchar(30) NOT NULL,
  `nome_reale` varchar(80) NOT NULL,
  `frase` varchar(500) DEFAULT NULL,
  `id_img` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `clown`
--

INSERT INTO `clown` (`nome_clown`, `nome_reale`, `frase`, `id_img`) VALUES
('Panada', 'Elena Macario', 'Sono un panada', 2),
('Sacucin', 'Monica Rolfo', 'Sono la più simpatica del gruppo', 2),
('Sigelin', 'Dotto Simone', 'Siamo i creatori del sito', 1),
('Spata', 'Cazzo ne so', 'Sono uno stronzo', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `eventi`
--

CREATE TABLE IF NOT EXISTS `eventi` (
`id` int(11) NOT NULL,
  `descrizione` varchar(150) NOT NULL,
  `luogo` varchar(150) DEFAULT NULL,
  `indirizzo` varchar(200) NOT NULL,
  `data` date NOT NULL,
  `ora_inizio` time NOT NULL,
  `tipo` char(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dump dei dati per la tabella `eventi`
--

INSERT INTO `eventi` (`id`, `descrizione`, `luogo`, `indirizzo`, `data`, `ora_inizio`, `tipo`) VALUES
(1, 'prova allenamento', 'casa di Dotto', 'Bombonina City', '2018-03-16', '07:00:00', 'A'),
(2, 'prova Spettacolo', 'Teatro Toselli di Cuneo', 'Via Roma 30, Cuneo', '2018-03-31', '20:00:00', 'S'),
(3, 'Prova 2 allenamento', 'Casa di Dalma', 'via circonvallazione vigne 36D, Chiusa di Pesio', '2018-04-06', '07:00:00', 'A'),
(4, 'Prova 2 spettacolo', 'Teatro don Bosco', 'via pippo 40B, Borgo san Dalmazzo', '2018-04-21', '21:00:00', 'S');

-- --------------------------------------------------------

--
-- Struttura della tabella `immagini`
--

CREATE TABLE IF NOT EXISTS `immagini` (
`id` int(11) NOT NULL,
  `src` varchar(150) NOT NULL,
  `tipo` char(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dump dei dati per la tabella `immagini`
--

INSERT INTO `immagini` (`id`, `src`, `tipo`) VALUES
(1, 'sostienici.jpg', 'U'),
(2, 'borsedistudio.jpg', 'U'),
(3, '5x1000.jpg', 'U'),
(4, 'chiSiamo1.jpg', 'A'),
(5, 'contattaci.jpg', 'A'),
(6, 'progetti.jpg', 'P');

-- --------------------------------------------------------

--
-- Struttura della tabella `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_pagine` int(11) NOT NULL,
  `menu_padre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `pagine`
--

CREATE TABLE IF NOT EXISTS `pagine` (
`id` int(11) NOT NULL,
  `titolo` varchar(150) NOT NULL,
  `id_img` int(11) DEFAULT NULL,
  `tipo` char(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dump dei dati per la tabella `pagine`
--

INSERT INTO `pagine` (`id`, `titolo`, `id_img`, `tipo`) VALUES
(1, 'articolo 1', 1, 'A'),
(2, 'articolo 2', 2, 'A'),
(3, 'articolo 3', 3, 'A'),
(4, 'articolo 4', 1, 'A');

-- --------------------------------------------------------

--
-- Struttura della tabella `presenze`
--

CREATE TABLE IF NOT EXISTS `presenze` (
  `user` varchar(30) NOT NULL,
  `id_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE IF NOT EXISTS `utenti` (
  `user` varchar(30) NOT NULL,
  `pwd` varchar(40) NOT NULL,
  `nome_clown` varchar(30) NOT NULL,
  `permessi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`user`, `pwd`, `nome_clown`, `permessi`) VALUES
('god', '1e4e888ac66f8dd41e00c5a7ac36a32a9950d271', 'Sigelin', 1),
('Panada98', '6223e57d2a63de2fa607f22095baf03da78c4b99', 'Panada', 3),
('Sacucin', 'e248ec6e3187fc5d95d401958f89b451858a0502', 'Sacucin', 2),
('Spata', 'cd5d714ea2b8edf0f1997b2d9b459c0b66cbe61b', 'Spata', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articoli`
--
ALTER TABLE `articoli`
 ADD PRIMARY KEY (`id_pagine`);

--
-- Indexes for table `clown`
--
ALTER TABLE `clown`
 ADD PRIMARY KEY (`nome_clown`);

--
-- Indexes for table `eventi`
--
ALTER TABLE `eventi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `immagini`
--
ALTER TABLE `immagini`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id_pagine`);

--
-- Indexes for table `pagine`
--
ALTER TABLE `pagine`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presenze`
--
ALTER TABLE `presenze`
 ADD PRIMARY KEY (`user`,`id_evento`);

--
-- Indexes for table `utenti`
--
ALTER TABLE `utenti`
 ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventi`
--
ALTER TABLE `eventi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `immagini`
--
ALTER TABLE `immagini`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pagine`
--
ALTER TABLE `pagine`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
