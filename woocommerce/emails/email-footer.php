<?php
/**
 * Email Footer
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-footer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>
															</div>
														</td>
													</tr>
												</table>
												<!-- End Content -->
											</td>
										</tr>
									</table>
									<!-- End Body -->
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td align="center" valign="top">
						<!-- Footer -->
						<table border="0" cellpadding="10" cellspacing="0" width="100%" id="template_footer">
							<tr class="desktop-footer">
								<td class="email-column revelations-logo-wrapper" valign="bottom">
									<img src="<?php echo get_template_directory_uri();?>/img/emails/nootropics-logo.png" alt="Revelations Nootropics logo">
								</td>
								<td class="email-column" valign="bottom">
									<div class="social-icons-wrapper">
										<img src="<?php echo get_template_directory_uri();?>/img/emails/fb-icon.png" alt="Facebook logo">
										<img src="<?php echo get_template_directory_uri();?>/img/emails/ig-icon.png" alt="Instagram logo">
										<img src="<?php echo get_template_directory_uri();?>/img/emails/twitter-icon.png" alt="Twitter logo">
									</div>
								</td>
								<td class="email-column wukiyo-logo-wrapper" valign="bottom">
									<img src="<?php echo get_template_directory_uri();?>/img/emails/wukiyo-logo.png" alt="Wukiyo logo">
								</td>
							</tr>
							<tr class="mobile-footer">
								<td width="100%" class="wukiyo-logo-wrapper" valign="bottom">
									<img src="<?php echo get_template_directory_uri();?>/img/emails/wukiyo-logo.png" alt="Wukiyo logo">
								</td>
								<td width="100%" valign="bottom">
									<div class="social-icons-wrapper">
										<img src="<?php echo get_template_directory_uri();?>/img/emails/fb-icon.png" alt="Facebook logo">
										<img src="<?php echo get_template_directory_uri();?>/img/emails/ig-icon.png" alt="Instagram logo">
										<img src="<?php echo get_template_directory_uri();?>/img/emails/twitter-icon.png" alt="Twitter logo">
									</div>
								</td>
								<td class="revelations-logo-wrapper" width="100%" valign="bottom">
									<img src="<?php echo get_template_directory_uri();?>/img/emails/nootropics-logo.png" alt="Revelations Nootropics logo">
								</td>
							</tr>
							<div class="randomness"><?php echo time(); ?></div>
						</table>
						<!-- End Footer -->
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>
