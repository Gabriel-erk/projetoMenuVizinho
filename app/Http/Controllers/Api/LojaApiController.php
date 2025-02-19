<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Loja;
use Exception;
use Illuminate\Http\Request;

class LojaApiController extends Controller
{
    public function index()
    {
        try {
            $loja = Loja::with('banners')->findOrFail(1);
            return response()->json([$loja], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao listar dados"], 500);
        }
    }

    public function show()
    {
        try {
            $loja = Loja::with('banners')->findOrFail(1); // Carrega a loja com os banners
            return response()->json($loja, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Loja não encontrada"], 404);
        }
    }

    public function store(Request $request)
    {
        // if (Loja::count() >= 1) {
        //     return redirect()->back()->with('error', 'Não é possível adicionar mais de 1 registro.');
        // }

        $request->validate([
            'nome_loja' => 'required|string|max:25',
            'logotipo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'texto_sobre_restaurante' => 'required|string',
            'imagem_sobre_restaurante' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'texto_politica_privacidade' => 'required|string',
            'regras_cupons' => 'required|string',
            'banner.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner_categoria.*' => 'required|in:cardapio,ofertas' // Valida categorias de banners
        ]);

        try {
            $logotipoPath = $request->file('logotipo')->store('imgLoja/logo', 'public');
            $imgSobrePath = $request->file('imagem_sobre_restaurante')->store('imgLoja/sobre-nos', 'public');

            $loja = Loja::create([
                'nome_loja' => $request->nome_loja,
                'logotipo' => $logotipoPath,
                'texto_sobre_restaurante' => $request->texto_sobre_restaurante,
                'imagem_sobre_restaurante' => $imgSobrePath,
                'texto_politica_privacidade' => $request->texto_politica_privacidade,
                'regras_cupons' => $request->regras_cupons,
            ]);

            if ($request->hasFile('banner')) {
                foreach ($request->file('banner') as $index => $banner) {
                    $categoria = $request->banner_categoria[$index];

                    // Conta banners existentes na categoria para definir a posição correta
                    $posicaoAtual = $loja->banners()->where('categoria', $categoria)->count() + 1;

                    $bannerPath = $banner->store('imgLoja/banners', 'public');
                    $loja->banners()->create([
                        'imagem' => $bannerPath,
                        'categoria' => $categoria,
                        'posicao' => $posicaoAtual
                    ]);
                }
            }

            return response()->json($loja, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao criar loja"], 500);
        }
    }

    public function update(Request $request, $id = 1)
    {
        // Validação dos campos de loja
        $request->validate([
            'nome_loja' => 'required|string|max:25',
            'logotipo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 'nullable' permite que a imagem seja opcional
            'texto_sobre_restaurante' => 'required|string',
            'imagem_sobre_restaurante' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 'nullable' para imagem opcional, pois o dono pode querer simplesmente manter a mesma img
            'texto_politica_privacidade' => 'required|string',
            'regras_cupons' => 'required|string',
        ]);

        try {
            // Encontrar a loja pelo ID
            $loja = Loja::findOrFail($id);

            // Atualização dos dados da loja
            $loja->update([
                'nome_loja' => $request->nome_loja,
                'logotipo' => $request->hasFile('logotipo')
                    ? $request->file('logotipo')->store('imgLoja/logotipo', 'public') // Se tiver imagem, armazena
                    : $loja->logotipo, // Caso contrário, manter a imagem existente
                'texto_sobre_restaurante' => $request->texto_sobre_restaurante,
                'imagem_sobre_restaurante' => $request->hasFile('imagem_sobre_restaurante')
                    ? $request->file('imagem_sobre_restaurante')->store('imgLoja/sobre-nos', 'public') // Salvar nova imagem se enviada
                    : $loja->imagem_sobre_restaurante, // Caso contrário, manter a imagem existente
                'texto_politica_privacidade' => $request->texto_politica_privacidade,
                'regras_cupons' => $request->regras_cupons,
            ]);

            return response()->json($loja, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao atualizar loja"], 500);
        }
    }

    public function destroy()
    {
        try {
            $loja = Loja::findOrFail(1);
            $loja->delete();
            return response()->json(["message" => "Loja deletado com sucesso"], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao deletar loja"], 500);
        }
    }

    // retorna a view politica, e passa o texto separado em bloco que contem titulo e paragráfo definindo cada bloco pelo espaçamento duplo (se no db tiver um espaçamento entre um texto e outro significa que é outro bloco de titulo-paragrafo)
    public function politica()
    {
        try {
            // encontrando o campo do texto de politica de privacidade
            $texto = Loja::findOrFail(1)->texto_politica_privacidade;

            // Separar o texto em blocos usando quebra de linha
            $blocos = preg_split('/\n\s*\n/', trim($texto)); // Usa quebras duplas de linha como separador

            $textoFormatado = [];

            foreach ($blocos as $bloco) {
                // Separar o título do parágrafo
                $linhas = preg_split('/\n/', trim($bloco), 2);
                $titulo = $linhas[0];
                $conteudo = isset($linhas[1]) ? $linhas[1] : '';

                // Adiciona o título e conteúdo ao array formatado
                $textoFormatado[] = [
                    'titulo' => $titulo,
                    'conteudo' => $conteudo
                ];
            }

            return response()->json($textoFormatado,200);
        } catch (Exception $e){
            return response()->json(['Erro'=> 'Erro ao listar dados'], 500);
        }
    }

    public function sobre(){
        try {
            $sobre = Loja::findOrFail(1)->texto_sobre_restaurante;
            return response()->json($sobre,200);
        } catch (Exception $e){
            return response()->json(['Erro'=> 'Erro ao listar dados'], 500);        
        }
    }
}
