# CompraCerta
 
## Descrição do Cenário
O supermercado vende produtos de diversas categorias. Quando o cliente acessar o sistema do CompraCerta ele poderá visualizar todos esses produtos de acordo com a categoria desejada. O supermercado eventualmente realiza promoções que devem ser apresentadas em destaque ao cliente. Para que o cliente efetue uma compra ele precisa se cadastrar no CompraCerta, selecionar os produtos desejados e efetuar o pagamento. Uma vez paga a compra ela entra em uma fila para ser atendida.

Visando atender às compra on-line, o supermercado operacionalizou seus processos internos em três setores: **preparação; conferencia e embalagem; e entrega**.

Na **preparação**, funcionários do supermercado selecionam fisicamente no estoque os produtos comprados e os colocam em um carrinho físico. Para facilitar a coleta
dos produtos, espera-se que eles utilizem um tablet que apresente a lista dos produtos da compra. O sistema deve apresentar sempre os produtos da primeira compra da fila. Podem existir vários funcionários neste setor e cada um atende a uma compra por vez.

Depois de separados todos os produtos, o funcionário entrega o carrinho ao setor de **conferência e embalagem**. Neste setor outro funcionário confere o pedido (se tiver algum problema ele retorna para a preparação), embala e envia para o setor de entregas.

A compra então é **encaminhada para a casa do cliente**. Não é cobrado frete para a entrega. Para facilitar o rastreamento da compra é importante registra quando ela entrou e saiu de cada setor até ser entregue ao cliente.
Quando a compra chega à residência do cliente o entregador conclui a entrega no sistema. Neste momento fica disponível no sistema uma opção para o cliente avaliar a qualidade da compra como ruim, boa ou ótima e fazer comentários.


## Pontos importantes:
Considere a existência de outro sistema onde os funcionários, as categorias, produtos, fabricantes e as promoções já estão cadastrados e você utilizará o banco de dados deste sistema. Desta forma, não é necessário implementar esses programas. Você deve somente construir um banco de dados e inserir manualmente esses dados.

Qualquer pessoa pode acessar o sistema do supermercado e consultar os produtos, mas somente clientes cadastrados podem realizar compras e avaliar compras.

O pagamento será realizado sempre via cartão de crédito no momento em que o cliente conclui a compra.
No fechamento da compra é preciso informar o endereço de entrega, que pode ser igual ou diferente do endereço do cliente.

Para facilitar a seleção de produtos em uma nova compra, o cliente pode consultar seu histórico de compras e realizar uma cópia de uma compra antiga para a nova compra.

### Os seguintes itens devem ser implementados:
- Cadastro do cliente (incluir, alterar, excluir e consultar) (Cliente);
- Visualizar produtos (Cliente);
- Selecionar produtos (Cliente);
- Fechar a compra (Cliente);
- Pagar, com cartão de crédito; (Cliente)
- Visualizar compras (setor de preparação);
- Enviar compra para conferencia e embalagem (setor de preparação);
- Visualizar compras (setor de conferência e embalagem);
- Enviar compra para entrega (setor de embalagem);
- Devolver compra para preparação (setor de embalagem);
- Visualizar compras (setor de entrega);
- Confirmar entrega (setor de entrega);
- Avaliar compra (cliente);
- Rastrear compra (cliente/funcionário), para consultar a situação da compra;
- Copia da compra anterior (Cliente);
