<?

namespace App\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('achieve_postman');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->arrayNode('mail')
                    ->children()
                        ->scalarNode('default_from')
                            ->defaultValue(null)
                            ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
