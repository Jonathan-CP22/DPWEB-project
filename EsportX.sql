
-- Dumping database structure for esportsx
CREATE DATABASE IF NOT EXISTS `esportsx` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `esportsx`;

-- Dumping structure for table esportsx.eventos
CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text,
  `data` date DEFAULT NULL,
  `local` varchar(100) DEFAULT NULL,
  `premio` varchar(100) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `img` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table esportsx.eventos: 11 rows
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` (`id`, `nome`, `data`, `local`, `premio`, `categoria`, `status`, `img`) VALUES
	(1, 'Campeonato Mundial de CS2	', '2024-12-12', 'Alemanha', '$1,000,000', 'cs2', 'completo', '1.jpg'),
	(2, 'Valorant Underground: LATAM South', '2024-12-03', 'LATAM South', '$2,500', 'valorant', 'completo', '2.png'),
	(3, 'Riot Games ONE PRO INVITATIONAL 2024', '2024-12-25', 'K Arena', '$200,000', 'valorant', 'incompleto', '3.png'),
	(4, 'Saudi eLeague 2024 - Championship', '2024-12-24', ' SEF Arena', 'SAR 400,000', 'valorant', 'incompleto', '4.png'),
	(5, 'ESL Pro League Season 20\n\n', '2024-04-25', 'Alemanha', '$850,000', 'cs2', 'completo', '5.png'),
	(6, 'Blast Premier Spring Final\n\n', '2024-03-13', 'Portugal', '$500,000', 'cs2', 'completo', '6.png'),
	(7, 'PGL Major Copenhagen\n\n', '2024-06-15', 'Dinamarca', ' $1,000,000', 'cs2', 'completo', '7.jpeg'),
	(8, 'IEM Katowice\n\n', '2024-12-26', 'Katowice', '$1,250,000', 'cs2', 'incompleto', '8.png'),
	(9, 'DreamHack Open\n\n', '2025-01-13', 'EUA', '$200,000', 'cs2', 'incompleto', '9.png'),
	(10, 'Gamers Without Borders', '2025-01-24', 'Reino Unido', '$150,000', 'cs2', 'incompleto', '10.jpg'),
	(11, 'Red Bull Home Ground\n\n', '2024-10-13', 'Berlim', '$200,000', 'valorant', 'completo', '11.png');
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;

-- Dumping structure for table esportsx.noticias
CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(128) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `info` text,
  `img` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table esportsx.noticias: 10 rows
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
INSERT INTO `noticias` (`id`, `titulo`, `categoria`, `info`, `img`) VALUES
	(1, 'Apresentando o gamers club', 'valorant', 'Expansão das vagas e introdução de equipes Academy: o ecossistema competitivo do VALORANT não para de evoluir. Visando ampliar oportunidades e seguir sendo a porta de entrada na jornada Rumo ao Pro do VCT.', 'news1.webp'),
	(2, 'Masters Bankok', 'valorant', 'Hoje, temos o prazer de anunciar os primeiros detalhes sobre a participação presencial do público e a venda de ingressos do Masters Bangkok!', 'news2.avif'),
	(3, 'Início da Temporada 2025 ', 'valorant', 'A Temporada 2025 dos Esports do VALORANT vai começar em janeiro e vem trazendo mudanças, novas equipes e novos formatos! Chegou agora? ', 'news3.avif'),
	(4, 'Tudo o que você precisa saber sobre o Spotlight ', 'valorant', 'O VCT OFF//SEASON não para, com o Spotlight Series Americas chegando à Riot Games Arena, em Los Angeles, de 6 a 8 de dezembro.', 'news4.avif'),
	(5, 'Notas da Atualização 9.10 do VALORANT', 'valorant', 'Nova atualização traz mudanças significativas nos agentes.', 'news5.avif'),
	(6, 'Major de Xangai 2024', 'cs2', 'No mês passado, equipas do mundo inteiro competiram com as melhores da sua região por um lugar no Major. A poeira assentou e 24 equipas sobreviveram: favoritas perenes, veteranas experientes e algumas novatas por estas bandas.', 'news6.png'),
	(7, 'O Arsenal', 'cs2', 'A atualização de hoje traz o Arsenal, os novos amuletos para armas e muito, muito mais. Clica na imagem para veres todos os detalhes!', 'news7.png'),
	(8, 'O verdadeiro MVP', 'cs2', 'Desde o lançamento do CS2, os criadores de mapas da comunidade têm trabalhado arduamente para criar novas experiências e atualizar alguns clássicos. Hoje, temos o prazer de adicionar os primeiros mapas comunitários ao CS2!', 'news8.png'),
	(9, 'Playoffs do Major de Xangai', 'cs2', 'A fase de eliminação do Major de Xangai 2024 da Perfect World contou com jogadas memoráveis, clutches de cortar a respiração e alguns dos melhores momentos 1vX de que há memória. E agora, as oito equipas finais irão competir pelo título de campeão do Major diante da plateia nas arquibancadas lotadas do Shanghai World Expo Exhibition & Convention Center.', 'news9.png'),
	(10, 'Domingo da final em Copenhaga', 'cs2', 'As semifinais do Major de Copenhaga contaram com a participação de quatro titãs do Counter?Strike: FaZe Clan contra Team Vitality e Natus Vincere contra G2 Esports.', 'news10.png');
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;

-- Dumping structure for table esportsx.partidas
CREATE TABLE IF NOT EXISTS `partidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `timeA` varchar(128) DEFAULT NULL,
  `timeB` varchar(128) DEFAULT NULL,
  `logoA` varchar(255) DEFAULT NULL,
  `logoB` varchar(255) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table esportsx.partidas: 8 rows
/*!40000 ALTER TABLE `partidas` DISABLE KEYS */;
INSERT INTO `partidas` (`id`, `data`, `hora`, `timeA`, `timeB`, `logoA`, `logoB`, `categoria`) VALUES
	(1, '2024-12-07', '15:50:00', 'Liquid', 'Natus Vincere', 'logo1.jpg', 'logo2.jpg', 'cs2'),
	(3, '2024-12-08', '20:50:27', 'Furia', 'G2', 'logo3.jpg', 'logo4.jpg', 'cs2'),
	(4, '2024-12-07', '21:25:12', 'LOUD', ' Fnatic', 'logo9.png', 'logo10.png', 'valorant'),
	(5, '2024-12-15', '21:29:42', 'Sentinels', 'DRX', 'logo11.png', 'logo12.png', 'valorant'),
	(6, '2025-01-12', '20:17:37', 'Ascend', 'Playmaster', 'logo5.jpg', 'logo6.png', 'cs2'),
	(7, '2024-12-09', '20:23:13', 'Doomeo', 'Nivux', 'logo7.jpg', 'logo8.jpg', 'cs2'),
	(8, '2024-12-26', '11:40:33', 'ZETA DIVISION', 'FOKUS', 'logo13.png', 'logo14.png', 'valorant'),
	(9, '2024-12-27', '11:43:53', 'Detonantion', 'Leviatán', 'logo15.png', 'logo16.png', 'valorant');
/*!40000 ALTER TABLE `partidas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
