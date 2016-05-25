<?php
/*
 *     E-cidade Software Publico para Gestao Municipal
 *  Copyright (C) 2014  DBSeller Servicos de Informatica
 *                            www.dbseller.com.br
 *                         e-cidade@dbseller.com.br
 *
 *  Este programa e software livre; voce pode redistribui-lo e/ou
 *  modifica-lo sob os termos da Licenca Publica Geral GNU, conforme
 *  publicada pela Free Software Foundation; tanto a versao 2 da
 *  Licenca como (a seu criterio) qualquer versao mais nova.
 *
 *  Este programa e distribuido na expectativa de ser util, mas SEM
 *  QUALQUER GARANTIA; sem mesmo a garantia implicita de
 *  COMERCIALIZACAO ou de ADEQUACAO A QUALQUER PROPOSITO EM
 *  PARTICULAR. Consulte a Licenca Publica Geral GNU para obter mais
 *  detalhes.
 *
 *  Voce deve ter recebido uma copia da Licenca Publica Geral GNU
 *  junto com este programa; se nao, escreva para a Free Software
 *  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
 *  02111-1307, USA.
 *
 *  Copia da licenca no diretorio licenca/licenca_en.txt
 *                                licenca/licenca_pt.txt
 */

class cl_fundamentacaolegaldesdobramentos extends DAOBasica {

  public function __construct() {
    parent::__construct("plugins.fundamentacaolegaldesdobramentos");
  }

  public function totalempenhadodesdobramento($iEmpAutorizaFundamentacaoLegal = null, $sWhere = null) {

    $sSql  = " SELECT SUM(coalesce(e60_vlremp, 0) - coalesce(e60_vlranu, 0)) as valor ";
	  $sSql .= " FROM plugins.empautorizafundamentacaolegal";
	  $sSql .= " 	INNER JOIN empautoriza ON e54_autori = empautoriza";
	  $sSql .= " 	INNER JOIN empempaut   ON e61_autori = e54_autori";
	  $sSql .= " 	INNER JOIN empempenho  ON e60_numemp = e61_numemp";
	  $sSql .= " 	INNER JOIN plugins.fundamentacaolegal ON plugins.fundamentacaolegal.sequencial = plugins.empautorizafundamentacaolegal.fundamentacaolegal";
	  $sSql .= " 	INNER JOIN plugins.fundamentacaolegaldesdobramentos ON plugins.fundamentacaolegaldesdobramentos.fundamentacaolegal = plugins.fundamentacaolegal.sequencial";
	  $sSql .= "  INNER JOIN orcdotacao  ON o58_coddot = e60_coddot and o58_anousu = e60_anousu and o58_orgao = plugins.fundamentacaolegaldesdobramentos.orgao and o58_unidade = plugins.fundamentacaolegaldesdobramentos.unidade";
    $sSql .= " WHERE 1=1 ";
    
    if(!empty($iEmpAutorizaFundamentacaoLegal)){
     	$sSql .= "and plugins.empautorizafundamentacaolegal.sequencial = {$iEmpAutorizaFundamentacaoLegal} ";
    }
	  $sWhere = trim($sWhere);
    if (!empty($sWhere)) {
      $sSql .= " and {$sWhere} ";
    }
    $rsSaldoDesdobramento = db_query($sSql);
    $nSaldoDesdobramento  = db_utils::fieldsMemory($rsSaldoDesdobramento, 0)->valor;

    return $nSaldoDesdobramento;

  }

}
