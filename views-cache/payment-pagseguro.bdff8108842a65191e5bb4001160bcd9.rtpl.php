<?php if(!class_exists('Rain\Tpl')){exit;}?><form method="post" action="https://pagseguro.uol.com.br/checkout/checkout.jhtml">
    <input type="hidden" name="email_cobranca" value="suporte@lojamodelo.com.br">
    <input type="hidden" name="tipo" value="CP">
    <input type="hidden" name="moeda" value="BRL">

    <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
    <input type="hidden" name="item_id_<?php echo htmlspecialchars( $counter1+1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    <input type="hidden" name="item_descr_<?php echo htmlspecialchars( $counter1+1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    <input type="hidden" name="item_quant_<?php echo htmlspecialchars( $counter1+1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value1["nrqtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    <input type="hidden" name="item_valor_<?php echo htmlspecialchars( $counter1+1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value1["vltotal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    <input type="hidden" name="item_frete_<?php echo htmlspecialchars( $counter1+1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="1">
    <input type="hidden" name="item_peso_<?php echo htmlspecialchars( $counter1+1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value1["vlheight"]*1000, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    <?php } ?>

    <input type="hidden" name="reference" value="<?php echo htmlspecialchars( $order["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    
    <!-- INÍCIO DOS DADOS DO USUÁRIO -->
    <input type="hidden" name="cliente_nome" value="<?php echo utf8_encode($order["desperson"]); ?>">
    <input type="hidden" name="cliente_cep" value="<?php echo htmlspecialchars( $order["deszipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    <input type="hidden" name="cliente_end" value="<?php echo utf8_encode($order["desaddress"]); ?>">
    <input type="hidden" name="cliente_num" value="<?php echo htmlspecialchars( $order["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    <input type="hidden" name="cliente_compl" value="<?php echo utf8_encode($order["descomplement"]); ?>">
    <input type="hidden" name="cliente_bairro" value="<?php echo utf8_encode($order["desdistrict"]); ?>">
    <input type="hidden" name="cliente_cidade" value="<?php echo utf8_encode($order["descity"]); ?>">
    <input type="hidden" name="cliente_uf" value="<?php echo htmlspecialchars( $order["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    <input type="hidden" name="cliente_pais" value="<?php echo htmlspecialchars( $order["descountry"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    <input type="hidden" name="cliente_ddd" value="<?php echo htmlspecialchars( $phone["areaCode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    <input type="hidden" name="cliente_tel" value="<?php echo htmlspecialchars( $phone["number"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    <input type="hidden" name="cliente_email" value="<?php echo htmlspecialchars( $order["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    <!-- FIM DOS DADOS DO USUÁRIO -->
    
</form>

<script type="text/javascript">
    document.forms[0].submit();
</script>
