-- --------------------------------------------------------

--
-- Estrutura para tabela `caminhao`
--

CREATE TABLE `caminhao` (
  `id` bigint(20) NOT NULL,
  `carro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `carroceria`
--

CREATE TABLE `carroceria` (
  `id` bigint(20) NOT NULL,
  `carreta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `estados`
--

CREATE TABLE `estados` (
  `id` bigint(20) NOT NULL,
  `estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` bigint(20) NOT NULL,
  `origem` bigint(20) NOT NULL,
  `destino` bigint(20) NOT NULL,
  `caminhao` bigint(20) NOT NULL,
  `carroceria` bigint(20) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `dia` date NOT NULL,
  `ton` tinyint(4) DEFAULT NULL,
  `ped` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `caminhao`
--
ALTER TABLE `caminhao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `carroceria`
--
ALTER TABLE `carroceria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_MSG_ORG` (`origem`),
  ADD KEY `FK_MSG_DES` (`destino`),
  ADD KEY `FK_MSG_CAM` (`caminhao`),
  ADD KEY `FK_MSG_CAR` (`carroceria`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `caminhao`
--
ALTER TABLE `caminhao`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `carroceria`
--
ALTER TABLE `carroceria`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `mensagens`
--
ALTER TABLE `mensagens`
  ADD CONSTRAINT `FK_MSG_CAM` FOREIGN KEY (`caminhao`) REFERENCES `caminhao` (`id`),
  ADD CONSTRAINT `FK_MSG_CAR` FOREIGN KEY (`carroceria`) REFERENCES `carroceria` (`id`),
  ADD CONSTRAINT `FK_MSG_DES` FOREIGN KEY (`destino`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `FK_MSG_ORG` FOREIGN KEY (`origem`) REFERENCES `estados` (`id`);
COMMIT;