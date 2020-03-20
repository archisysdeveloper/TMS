<?php 
//var_dump($row);
?>
<style>
 body {font-family: Arial; color: #333; padding-bottom: 75px;}
.format_text {width:990px;margin:0 auto;}
em {color:red;}
.AgreeBlock {width:100%;
position: fixed;
bottom: 0px;
background: grey;
padding: 5px 0px;}

</style>
<title>Archisys Contract : <?php echo $row->pro_name ?> </title>
<div class="format_text">
<p style="text-align: center;">AGREEMENT FOR WEB DESIGN &amp; DEVELOPMENT</p>
<p><strong>1. Authorization.  </strong>The Client,     <em><?php echo $row->pro_client ?></em>, authorizes Stallion Archisys Ltd, at 101 Shitalnath Appt , Vikas Gruh Road , Ahmedabad - India (herein referred to as the “The Company”) to develop a website for 
  <em><?php echo $row->pro_fullCompnay ?>;</em>  													 referred to as the “Client”) for the project	
  <em><?php echo $row->pro_name ?></em>.  The Client authorizes The Company to access Client’s web host server to upload and download files as needed from the Client directory for the purposes of creating a website.  The Client authorizes use of Client’s logo and all brand identification in the creation of the website.  The Client also authorizes The Company to submit Client’s site to search engines and to any other directories requested by the Client for marketing purposes.  If necessary, the Client authorizes The Company to purchase a domain, stock photography, and any other services or materials required for the express purpose of the creation of the Client’s website. </p>
<p><strong>2. Fees.</strong> Fees for website service are <em>$<?php echo $row->pro_rate ?></em> per hour. Before The Company will begin work on the website, 
Client automatically agrees to this contract with the initial payment of 20% of the total estimate quoted below. A final bill will be mailed to the Client upon completion of the project. </p>
<p><strong>3. Estimate. </strong>The following is an estimate for services to be rendered. The initial fee required for The Company to begin work is <em>$<?php echo round($row->pro_estimate/5,2) ?></em>. 
Estimates are based at a rate of $<?php echo $row->pro_rate ?> per hour. Final fees and expenses shall be shown when invoice is rendered. 
The Client’s approval shall be obtained in writing for any increases in fees or expenses that exceed the original estimate by 10% or more.
</p>
<p>The Company will </p>
<p><em><?php echo $row->pro_desc ?></em></p>
<p>for the amount of <em>$<?php echo $row->pro_estimate ?></em>.</p>
<p>The Company will not proceed with any work that would exceed the original estimated total until receiving written approval from Client for the new estimated total.</p>
<p><strong>4. Completion.  </strong>The Company will submit final website to Client for approval in writing. If necessary, the Company will submit final website to search engines when both Client and The Company agree that website is ready for submission to search engines and directories. </p>
<p>Time required to make changes to website after The Company has already received final Client approval of the website will be added to the final bill. If Client has already received the final bill, time required to make changes to website after Client approval will be submitted to Client as a separate bill. </p>
<small>
<p><strong>5. Payment Terms.</strong> Until payment is received in full, The Company owns the website  design and any files created for the website. Once The Company has received payment in full, the website ownership is transferred to the Client.  The Company will bill client weekly for work performed on an hourly basis at the rate of $<?php echo $row->pro_rate ?> per hour.  Any deposits paid by Client will be credited against The Company’s fee for each weekly billing cycle.  After all credits have been applied for Client’s deposit(s), payment for work done through the time of invoicing is due upon receipt of invoice. </p>
<p><strong>6. Default in Payment.</strong> The Client shall assume responsibility for all collection of legal fees necessitated by default in payment.</p>
<p><strong>7.  Expenses.  </strong>The Client shall reimburse The Company for all expenses arising from this assignment, including the payment of any sales taxes due on this assignment. </p>
<p><strong>8. Deadlines.</strong> The Company agrees to have Client’s website completed no later than <em><?php echo $row->pro_deadline ?></em>. 
This deadline can be reached only if the Client has provided all necessary graphics, text content, and logins to The Company by <em><?php echo $row->pro_deadline_content ?></em>.  The Company shall not be held responsible for delays to site development arising out of Client’s delays in providing graphics, text, and logins to The Company. </p>
<p>If website is not completed by <em><?php echo $row->pro_deadline ?></em>  due to lack of Client assistance, The Company may <br>
  a) Extend the project deadline or<br>
  b) Close the project and bill Client for work completed at $<?php echo $row->pro_rate ?> per hour, or <br>
c) The Company will create a website using all content that has been provided, and send a final bill for work completed to meet the project deadline.</p>
<p><strong>9. Copyright. </strong>The Client represents that all website content including logos, trademarks, photos, illustrations, audio, video, and written content provided to The Company are owned by the Client, or the Client has received explicit permission for use, and do not violate the law in their respective country. </p>
<p>Client has also received permission from all individuals photographed to be shown on the web. Each person in photos going online understands that their face will be seen on the Internet. Any names and contact information placed on the website also have been provided with consent from each individual.</p>
<p>Client agrees to indemnify and hold Archisys harmless against all claims, including but not limited to claims of copyright or trademark infringement, violations of the rights of privacy or publicity or defamation, arising out of use of the work.</p>
<p><strong>10. Ownership of Copyright. </strong>The Company acknowledges and agrees that the Client retains all rights to copyright in the subject material. </p>
<p><strong>11. Ownership and Return of Artwork.</strong> All content created by The Company and/or her subcontractors for the Client are the property of the Client. Client hereby grants to The Company the right to use the work for demonstration of past work performed via portfolio or advertising.</p>
<p><strong>12. Cancellation of Work.</strong><br>
In the event of cancellation of this assignment, ownership of all copyrights and any original artwork shall be retained by the designer. </p>
<p><em>By Client: </em>Client may cancel work on the website at any time by submitting notice to The Company via certified mail. The Company will halt work upon receipt of certified letter from Client requesting cancellation. At that time, Client will be responsible for paying for all work completed prior to The Company’s receipt of cancellation request. Work completed shall be billed at an hourly rate of $<?php echo $row->pro_rate ?> per hour. If, at the time of request for refund, work has been completed beyond the amount of work paid for by the initial payment, the Client shall pay for work completed. </p>
<p><em>By The Company:</em> The Company reserves the right to refuse service and cancel a website project if necessary, in which case, the balance of the initial payment will be returned to Client after all applicable fees have been deducted for work completed. The Company may cancel project for any reason she deems necessary, including but not limited to Client not providing necessary information, text and graphics in a timely fashion to The Company. </p>
<!--
<p><strong>13.  Internet Access.  </strong>Access to the internet will be provided by a separate Internet Service Provider (ISP) to be contracted by the Client and who will not be a party to this agreement.</p>
<p><strong>14. Other Electronic Commerce Business Relationships.  </strong>The Client understands that the web host, credit card processing services and any other businesses not owned by The Company are not parties to this contract and are separate business entities from The Company.  The Client understands that The Company has no control over functionality or availability of website due to the actions or inaction of the web host server, credit card processing, online banking and any other business services the Client uses to transact business over the Internet outside of The Company.  The Company makes no representations, warranties or guarantees for any recommendations of other Internet business partners.</p>
<p><strong>15.  Progress Reports.  </strong>The Company shall contact or meet with the Client on a mutually acceptable schedule to report all tasks completed, problems, encountered, and recommended changes relating to the development and testing of the web site.  The Company shall inform the Client promptly by telephone or email upon discovery of any event or problem that may significantly delay the development of the work.</p>
<p><strong>16.  The Company’s Guarantee for Program Use.  </strong>The Company guarantees to notify the Client of any licensing and/or permissions required for art-generating/driving programs to be used. </p>
<p><strong>17.  Changes.</strong> The Client shall be responsible for making additional payments for changes in original assignment requested by the Client. However, no additional payment shall be made for changes required to conform to the original assignment description. </p>
<p><strong>18.  Testing and Acceptance Procedures.</strong> The Company will make every good-faith effort to test all elements of the web site thoroughly and make all necessary corrections as a result of such testing prior to handing over the deliverables to the Client. Upon receipt of the web site, the Client shall either accept the web site and make the final payment set forth herein or provide The Company with written notice of any corrections to be made and a suggested date for completion, which should be mutually acceptable to both The Company and the Client. </p>
<p><strong>19. Sole Agreement and Amendment.  </strong>This contract constitutes the sole agreement between The Company and the Client and hereby voids any prior agreements, written or verbal. This agreement may be amended, in writing, by both parties at any time.</p>
<p><strong>20. No Guarantees.</strong> The Company makes no representations or guarantee as to the amount of traffic to the Client’s site or interest generated in the Client’s site.  The Company makes no representations and does not guarantee an increase in Client sales, nor does The Company promise top listing in any search engine or directory.  The Company will use her best efforts to perform under the contract, and makes no representation or guarantee that the site will be accessible by all browser and operating systems.</p>
<p><strong>21. Electronic Commerce Law.</strong> The Client agrees that the Client is solely responsible for compliance with federal and/or state laws regarding any electronic commerce conducted through their website and will hold harmless The Company and her subcontractors from any claim, causes of action, penalty, tax, and/or tariff arising from the Client’s use of electronic commerce.</p>
<p><strong>22. Confidentiality. </strong>The Company understands that she will be working with confidential Client information and will only release this information to parties directly involved in website creation. Client authorizes designer to release information to third parties requiring access for site creation. This includes, but is not limited to, website and email address userids and passwords, trade information, and banking information should the Client request online shopping. Upon website completion, Client will change any banking passwords The Company has had access to. If Client chooses not to retain Archisys for website maintenance, Client will change ftp, email, and any other passwords The Company has had access to. Client will hold The Company harmless should breach of security occur if Client has not changed business passwords.</p>
<p><strong>23. Security. </strong>Archisys will make reasonable attempts to protect the integrity of the Client website. This includes patching any third party software, such as Content Management Systems, used on the Client’s site. However, as this software is not created by Archisys, the designer can not be held responsible for security flaws by the software creators. As no software or server is 100% safe from security breach, the Client understands that the designer can not be held accountable for all security breaches should they occur. Further, The Company is not held accountable for patching any software that has been installed to the site without The Company’s knowledge.</p>
<p>The Company will make updates and changes to the site, and provide information regarding the website to the Client and up two of Client’s designees (herein referred to as the “points of contact”).  Should any other employee or member of the Client’s organization contact Archisys regarding the website, the designer will contact one or all of the three designated points of contact with the issue. Client shall notify The Company of Client’s designees in writing, and shall identify them by name, email address and phone number.  Any email requesting changes to the site or information from the site that is not from a point of contact email on file will be referred to a current point of contact. Points of contact may be changed at any time during the maintenance of the site, provided notice is made to the designer in writing from a designated contact email.</p>
<p>The Client will also provide an emergency contact and phone number should there be an emergency requiring input from the Client.</p>
<p><strong>24. Accessibility, Usability, Cross-Platform Issues. </strong>The designer will do their best to make sites as accessible, useable, and cross-platform as possible. Client understands that some site features will cause a website to not meet these standards 100%. The Client understands that no website will look and function identically all browsers and operating systems and that any attempt to do so is futile. </p>
<p>Client will be informed if features requested by the Client will negatively impact website accessibility, usability, and cross-platform use. Client agrees to indemnify and hold Archisys harmless against all claims with regard to these matters. </p>
<p><strong>25. Continuing Website Maintenance and Promotion.</strong> No agreement for continuing website maintenance and promotion is contained in this contract.&nbsp;No website maintenance&nbsp;or promotion will be performed by designer&nbsp;unless all parties reach an agreement to do so and all parties sign a website maintenance or website promotion agreement.&nbsp; </p>
<p>The undersigned agrees to these terms on behalf of his or her organization or business.  The undersigned represents that he/she is fully authorized to sign this agreement on behalf of the organization or business represented, and that the business entity represented is bound by this agreement.</p>
<p><strong>26.  Unauthorized Use and Program License.  </strong>The Client will indemnify The Company against all claims and expenses arising from uses for which the Client does not have rights to or authority to use.  The Client will be responsible for payment of any special licensing or royalty fees resulting from the use of graphics programs that require such payments. </p>
<p><strong>
<em><span style="color: red;">Note: 27 does not apply for website template customization.</span> </em></strong></p>
<p><strong>27.  Warranty of Originality.</strong> The Company warrants and represents that, to the best of her knowledge, the design work assigned hereunder is original and has not been previously published, or that consent to use has been obtained on an unlimited basis; that all work or portions thereof obtained through the undersigned from third parties is original or, if previously published, that consent to use has been obtained on an unlimited basis; that The Company has full authority to make this agreement; and that the work prepared by The Company does not contain any scandalous, libelous, or unlawful matter.  This warranty does not extend to any uses that the Client or others may make of The Company’s product that may infringe on the rights of others.  CLIENT EXPRESSLY AGREES THAT IT WILL HOLD THE COMPANY HARMLESS FOR ALL LIABILITY CAUSED BY THE CLIENT’S USE OF THE COMPANY’S PRODUCT TO THE EXTENT SUCH USE INFRINGES ON THE RIGHTS OF OTHERS.</p>
<p><strong>28.  Acceptance of Terms.  </strong>The signature of both parties shall evidence acceptance of these terms. </p>
<p><strong>39. General Matters. </strong><br>
This Agreement shall be governed by the laws of the state of Gujarat / India and shall be construed in accordance therewith.</p>
<p>No provision of this Agreement may be waived, except by an agreement in writing
  by the waiving party. A waiver of any term or provision shall not be construed as
a waiver of any other provision.</p>
<p>This Agreement shall be binding upon the parties, their successors, and assigns.</p>
<p>This Agreement may be amended, altered, or revoked at any time, in whole or in part,
  by the written agreement of the parties hereto.</p>
<p>Throughout this Agreement, the singular shall include the plural, the plural shall include
  the singular, and the masculine and neuter shall include the feminine, wherever the
context so requires.</p>
<p>The headings of Paragraphs are included solely for convenience of reference.
  If any conflict between the headings and the text of this Agreement exists, the text will 
control.</p>
<p>The undersigned agrees to these terms on behalf of his or her organization or business followed by deposit of the initial amount. 
</p>
-->
</small>
				</div>
				
<div class="AgreeBlock">
<center>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="sales@archisys.in">
<input type="hidden" name="item_name" value="Advance for <?php echo $row->pro_name ?>">
<input type="hidden" name="item_number" value="<?php echo $row->pro_name ?>01">
<input type="hidden" name="amount" value="<?php echo round($row->pro_estimate/5,2) ?>">
<input type="hidden" name="first_name" value="<?php echo $row->pro_client ?>">
<input type="hidden" name="last_name" value="">
<input type="hidden" name="address1" value="">
<input type="hidden" name="address2" value="">
<input type="hidden" name="city" value="">
<input type="hidden" name="state" value="">
<input type="hidden" name="zip" value="">
<input type="submit" value="Accept & Start"/>
</form>


</center>
</div>				