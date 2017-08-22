<?php

namespace CoreShop\Bundle\ResourceBundle\Generator;

use Sensio\Bundle\GeneratorBundle\Generator\Generator;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;

final class PimcoreResourceClassGenerator extends Generator
{
    /**
     * @param BundleInterface $bundle
     * @param $modelName
     * @param $inheritFrom
     */
    public function generateResourceClass(BundleInterface $bundle, $modelName, $inheritFrom): void
    {
        $dir = $bundle->getPath();
        $modelFile = $dir.'/Model/'.$modelName.'.php';

        if (file_exists($modelFile)) {
            throw new \RuntimeException(sprintf('Model "%s" already exists', $modelName));
        }

        $parameters = array(
            'namespace' => $bundle->getNamespace(),
            'bundle' => $bundle->getName(),
            'model' => $modelName,
            'inheritFrom' => $inheritFrom
        );

        $this->renderFile('model/Resource.php.twig', $modelFile, $parameters);
    }
}