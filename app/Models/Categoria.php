// Categoria.php (Modelo)
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    // Relación inversa con los productos
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
