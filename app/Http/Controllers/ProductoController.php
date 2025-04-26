namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Listar todos los productos
    public function index()
    {
        $productos = Producto::all();
        return response()->json($productos, 200);
    }

    // Crear un nuevo producto
    public function store(Request $request)
    {
        // Validación de los campos de entrada
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',  // Asegura que el precio no sea negativo
            'descripcion' => 'nullable|string',
        ]);

        // Crear el nuevo producto con los datos validados
        $producto = Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
        ]);

        return response()->json($producto, 201);
    }

    // Mostrar un producto específico
    public function show($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['mensaje' => 'Producto no encontrado'], 404);
        }

        return response()->json($producto, 200);
    }

    // Actualizar un producto
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['mensaje' => 'Producto no encontrado'], 404);
        }

        // Validación para los campos de actualización
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
        ]);

        // Actualizar los campos del producto
        $producto->update($request->all());

        return response()->json($producto, 200);
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['mensaje' => 'Producto no encontrado'], 404);
        }

        // Eliminar el producto
        $producto->delete();

        return response()->json(['mensaje' => 'Producto eliminado correctamente'], 200);
    }
}

