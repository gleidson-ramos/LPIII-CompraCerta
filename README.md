# 🛒 Supermercado CompraCerta
Projeto construído usando `MySQL`, `PHP`e o padrão **`MVC`** simulando um sistema de compras online, desde a consulta e seleção dos produtos pelo cliente até a preparação, conferência, embalagem e entrega do pedido.

## ✨ Funcionalidades
### 👤 Cliente
- Cadastro de cliente
- Inclusão, alteração, exclusão e consulta de clientes
- Visualização de produtos por categoria
- Seleção de produtos
- Fechamento da compra
- Pagamento com cartão de crédito
- Definição do endereço de entrega
- Consulta do histórico de compras
- Cópia de uma compra anterior
- Rastreamento da compra
- Avaliação da compra
- Inclusão de comentários sobre a compra

### 📦 Setor de Preparação
- Visualização das compras aguardando preparação
- Atendimento das compras seguindo a ordem da fila
- Visualização dos produtos que devem ser separados
- Envio da compra para o setor de conferência e embalagem

### 🔎 Setor de Conferência e Embalagem
- Visualização das compras recebidas
- Conferência dos produtos
- Devolução da compra para o setor de preparação quando houver problemas
- Envio da compra para o setor de entrega

### 🚚 Setor de Entrega
- Visualização das compras aguardando entrega
- Encaminhamento da compra para o endereço informado
- Confirmação da entrega
- Finalização do pedido

### 📍 Rastreamento
- O sistema permite consultar a situação da compra durante todo o processo.
- O sistema deve registrar a entrada e a saída da compra em cada etapa, permitindo acompanhar seu histórico.

### 💳 Pagamento
- O pagamento é realizado exclusivamente por cartão de crédito no momento do fechamento da compra.

### 🏠 Endereço de Entrega
Durante o fechamento da compra, o cliente deve informar o endereço de entrega. O endereço pode ser:
- O mesmo endereço cadastrado no sistema.
- Um endereço diferente informado para aquela compra.


### 🚚 Entrega
Depois de conferida e embalada, a compra é encaminhada para entrega.
O entregador realiza a entrega no endereço informado pelo cliente e confirma a conclusão da entrega no sistema.

Após a confirmação, o cliente pode avaliar a compra.

### ⭐ Avaliação
Depois que a entrega for confirmada, o cliente poderá avaliar a qualidade da compra.

As opções de avaliação são:
- Ruim
- Boa
- Ótima

O cliente também pode adicionar um comentário sobre sua experiência.

### 🕒 Histórico e Rastreamento
O sistema deve armazenar o histórico de movimentação da compra.


### 🏷️ Produtos e Categorias
- O supermercado possui produtos organizados em diferentes categorias.
- O cliente pode consultar os produtos de acordo com a categoria desejada.


### 👥 Controle de Acesso
O sistema possui diferentes tipos de usuários e operações.

#### Visitante
- Consulta produtos
- Visualiza categorias
- Visualiza promoções

#### Cliente cadastrado
- Realiza compras
- Consulta histórico
- Copia compras anteriores
- Rastrea compras
- Avalia compras

#### Funcionário
Pode realizar operações relacionadas aos setores internos:
- Preparação
- Conferência e embalagem
- Entrega


## 📄 Sobre o Projeto
Este projeto foi desenvolvido como atividade acadêmica para a disciplina de Linguagem de Programação III simulando uma plataforma de compras online de supermercado acompanhando o pedido desde a seleção dos produtos até a confirmação da entrega, passando pelos setores internos de preparação, conferência, embalagem e entrega.