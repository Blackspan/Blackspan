<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information, see
 * <http://www.doctrine-project.org>.
 */

namespace Doctrine\Common\Annotations;
use Doctrine\Common\Annotations\Reader;

/**
 * Allows the reader to be used in-place of Doctrine's reader.
 *
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
class IndexedReader implements Reader {
	private $delegate;

	public function __construct(Reader $reader) {
		$this->delegate = $reader;
	}

	public function getClassAnnotations(\ReflectionClass $class) {
		$annotations = array();
		foreach ($this->delegate->getClassAnnotations($class) as $annot) {
			$annotations[get_class($annot)] = $annot;
		}

		return $annotations;
	}

	public function getClassAnnotation(\ReflectionClass $class, $annotation) {
		return $this->delegate->getClassAnnotation($class, $annotation);
	}

	public function getMethodAnnotations(\ReflectionMethod $method) {
		$annotations = array();
		foreach ($this->delegate->getMethodAnnotations($method) as $annot) {
			$annotations[get_class($annot)] = $annot;
		}

		return $annotations;
	}

	public function getMethodAnnotation(\ReflectionMethod $method, $annotation) {
		return $this->delegate->getMethodAnnotation($method, $annotation);
	}

	public function getPropertyAnnotations(\ReflectionProperty $property) {
		$annotations = array();
		foreach ($this->delegate->getPropertyAnnotations($property) as $annot) {
			$annotations[get_class($annot)] = $annot;
		}

		return $annotations;
	}

	public function getPropertyAnnotation(\ReflectionProperty $property,
			$annotation) {
		return $this->delegate->getPropertyAnnotation($property, $annotation);
	}

	/**
	 * Proxy all methods to the delegate.
	 * 
	 * @param type $method
	 * @param type $args
	 * @return type 
	 */
	public function __call($method, $args) {
		return call_user_func_array(array($this->delegate, $method), $args);
	}
}
