<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace Hyperf\Constants\Annotation;

use Hyperf\Constants\AnnotationReader;
use Hyperf\Constants\ConstantsCollector;
use Hyperf\Di\Annotation\AbstractAnnotation;

/**
 * @Annotation
 * @Target({"CLASS"})
 */
class Constants extends AbstractAnnotation
{
    public function collectClass(string $className): void
    {
        $reader = new AnnotationReader();

        $ref = new \ReflectionClass($className);
        $classConstants = $ref->getReflectionConstants();
        $data = $reader->getAnnotations($classConstants);

        ConstantsCollector::set($className, $data);
    }
}
