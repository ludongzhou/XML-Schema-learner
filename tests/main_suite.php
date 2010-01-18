<?php
/**
 * Schema learning
 *
 * This file is part of SchemaLearner.
 *
 * SchemaLearner is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; version 3 of the License.
 *
 * SchemaLearner is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with SchemaLearner; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @package Core
 * @version $Revision: 1236 $
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPL
 */

/**
 * Require tests
 */
require 'main/automaton_tests.php';
require 'main/single_occurence_automaton_tests.php';
require 'main/weighted_single_occurence_automaton_tests.php';
require 'main/counting_single_occurence_automaton_tests.php';
require 'main/type_inferencer_tests.php';
require 'main/sore_converter_tests.php';
require 'main/chare_converter_tests.php';
require 'main/regular_expression_optimizer_tests.php';
require 'main/regular_expression_optimizer_manager_tests.php';
require 'main/schema_tests.php';

/**
 * General root test suite
 */
class slMainTestSuite extends PHPUnit_Framework_TestSuite
{
    /**
     * Basic constructor for test suite
     * 
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName( 'SchemaLearner - Main' );

        $this->addTest( slMainAutomatonTests::suite() );
        $this->addTest( slMainSingleOccurenceAutomatonTests::suite() );
        $this->addTest( slMainWeightedSingleOccurenceAutomatonTests::suite() );
        $this->addTest( slMainCountingSingleOccurenceAutomatonTests::suite() );
        $this->addTest( slMainTypeInferencerTests::suite() );
        $this->addTest( slMainSoreConverterTests::suite() );
        $this->addTest( slMainChareConverterTests::suite() );
        $this->addTest( slMainRegularExpressionOptimizerTests::suite() );
        $this->addTest( slMainRegularExpressionOptimizerManagerTests::suite() );
        $this->addTest( slMainSchemaTests::suite() );
    }

    /**
     * Return test suite
     * 
     * @return slTestSuite
     */
    public static function suite()
    {
        return new slMainTestSuite( __CLASS__ );
    }
}
