Create Table produtos (
  id smallint(5) unsigned NOT NULL auto_increment,
  nome varchar(150) NOT NULL,
  descricao text NOT NULL,
  preco double(5,2) NOT NULL,
  Primary Key  (id)
) type=InnoDB Character Set latin1 Collate latin1_general_ci;

Insert Into produtos Values (NULL, 'Dream Theater - Metropolis Pt.2 Scenes From A Memory', 'O melhor CD da banda Dream Theater.', 23.50), (NULL, 'Tuatha de Danann - Trova di Danú', 'O mais recente e melhor CD dessa banda de Varginha-MG.', 25.00), (NULL, 'Metallica - Master of Puppets', 'O melhor CD deles.\r\n\r\nFoi o último em que Cliff Burton tocava.', 23.60), (NULL, 'Imago Mortis - Vida: The Play of Change', 'CD conceitual de uma das melhores bandas de São Paulo', 22.50);
