<?php
/**
 * Schema learning
 *
 * This file is part of XML-Schema-learner.
 *
 * XML-Schema-learner is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as
 * published by the Free Software Foundation; version 3 of the
 * License.
 *
 * XML-Schema-learner is distributed in the hope that it will be
 * useful, but WITHOUT ANY WARRANTY; without even the implied warranty
 * of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with XML-Schema-learner; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA
 * 02110-1301 USA
 *
 * @package Core
 * @version $Revision: 1236 $
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPL
 */

/**
 * Regular expression optimizer.
 *
 * @package Core
 * @version $Revision: 1236 $
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPL
 */
class slRegularExpressionRepetitionOptimizer extends slRegularExpressionOptimizerBase
{
    /**
     * Optimize regular expression
     *
     * Tries to optimize the given regular expression. Returns true if the AST 
     * has been modified, and false otherwise.
     * 
     * @param slRegularExpression $regularExpression 
     * @return bool
     */
    public function optimize( slRegularExpression &$regularExpression )
    {
        if ( ( ( $op1 = $regularExpression instanceof slRegularExpressionOptional ) ||
               ( $regularExpression instanceof slRegularExpressionRepeated ) ) &&
             ( ( $op2 = $regularExpression->getChild() instanceof slRegularExpressionOptional ) ||
               ( $regularExpression->getChild() instanceof slRegularExpressionRepeated ) ) )
        {
            $class = $op1 && $op2 ? 'slRegularExpressionOptional' : 'slRegularExpressionRepeated';
            $regularExpression = new $class( $regularExpression->getChild()->getChild() );
            return true;
        }

        return $this->recurse( $regularExpression );
    }
}

