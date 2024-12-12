lógica de colocar adicionais

/*

** método addAdicional **

* pegar o usuário logado, verificar se o carrinho dele existe, se não existe (não tem nenhum produto, se não tem nenhum joga uma msg (jogando a msg padrão que o findOrFail dá) q ele não tem o produto no carrinho "adicione-o primeiro")

* pegar o produto, verificar se está no carrinho, se não estiver, retorna uma msg, dizendo que tem q estar no carrinho primeiro, se já estiver, vincula o produto ao adicional, e depois passo ele para o carrinho (ou, crio um campo no carrinho para o adicional)
porém, o produto na hora de ser listado é passado para o metódo de itens carrinho, e é listado por lá, o que talvez possa estar conflitando com os adicionais, pois eles estão vinculados ao produto, não ao itens carrinho, então, seria uma boa abordagem fazer com que a tabela itensCarrinho visse os adicionais, que os adicionais estivessem nos itenscarrinho também, ou seja, criar novamente uma tabela intermediária para associar itens carrinho e adicionais.
* porém, antes preciso criar uma relação na tabela intermediária produto_adicional, que ligue o produto a seu respectivo adicional, para depois sim fazer com que itens carrinho busque a relação de ambos e os "Junte" novamente.
**ideia: ter uma relação de itens_carrinho-adicionais da mesma forma que produto tem com itens_carrinho 
**ideia: algum campo em itens_carrinho tipo "sub_categoria_produtos" que po, um produto pode ter várias sub_categorias, e o campo não é necessariamente um array, é apenas uma chave estrangeira ligada a outra tabela, que através dela listo todas as sub_categorias do meu produto, e assim, posso fazer o mesmo com os adicionais, criar um campo de chave estrangeira em itens_carrinho, que liga a tabela adicionais, e assim, posso fazer com que os adicionais se relacionem com os produtos

*/