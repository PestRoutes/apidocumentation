<section class='home page_section'>
    <section class='pre_line'>
        Welcome to the FieldRoutes API documentation!

        Resources:
        <a class='navigation_anchor' page='documentation' data='' href='/documentation'>
        <span class='home_icons'>📗</span>Documentation on individual endpoints</a>
        <a class='navigation_anchor' page='examples' data='' href='/examples'>
        <span class='home_icons'>👨‍🏫</span>Examples and workflows</a>
        <a class='navigation_anchor' page='faq' data='' href='/faq'>
        <span class='home_icons'>❔</span>Frequeuntly asked questions</a>
        <a class='navigation_anchor' page='tools' data='' href='/tools'>
        <span class='home_icons'>🔨</span>Tools</a>

        Things to know:
      
        <strong>Base URL</strong>
        {yoursubdomain}.fieldroutes.com/api/{endpoint}/{action}
        Example: https://mycompany.fieldroutes.com/api/customer/search

        <strong>Authentication</strong>
        - In order to successfully validate a request to our API it requires the use of two fields that could either be in the headers of the request
          or as part of the parameters in the payload being passed in
        - Required parameters
            - authenticationKey
            - authenticationToken

        <strong>Search endpoints</strong> have a return limit of 50,000 IDs.
        - If you encounter a result set that has exactly 50,000 IDs, more requests will be needed
        - Filter on the primary key using operator '&gt;' with a value as the last item in the last full set
            - An example for customer/search would be similar to the following "customerIDs":{"operator":">","value":12345}
        - Continue until a set of less than 50,000 is recieved

        <strong>Get endpoints</strong> have a return limit of 1,000 entities.
        - Break requests apart to request for 1,000 entites or fewer additional inputs may be truncated
            - As an example the customer/get endpoint would require the use of the "customerIDs"
            field and the value needed would be an array of IDs for the customers in question
        - Sending the authentication key and token as the last input parameters can ensure that no partial request will execute successfully

        <strong>Global keys</strong> and office scope:
        - When using a Global key we have to take into consideration a couple things depending on the endpoint.
        - Write request (create, update, etc actions)
            - In order to target the correct office we have to include the field "officeID" with the specific officeID that the request needs to be on 
            - Example: When using something such as the customer/create endpoint please include: officeID=8 to target the customer being created in office 8
        - Read request (search and get endpoints)
            - The search and get actions need to have a field "officeIDs"
                - if a search across ALL offices is needed then please use officeIDs=0
                - if a search across specific offices is needed then  please use officeIDs=[2,3,6,23]
                - if a search is needed for a specific office then please use officeIDs=[4]

When an officeID isn't used and the key is Global then the default officeID is used instead, this usually falls under office 1 in most cases.

        <strong>Key grouping</strong>:
        - By default each key has it's own distinct read/write limits
        - By request, keys can be grouped together such that their limits and usage are aggregated into a common pool
		
        <strong>API Usage</strong>
        - We provide a quick report of API usage under the documentation/usage endpoint.  This report will contain API usage for the the past week of usage
        - If only today's API usage is needed then we can add in a flag called "today" documentation/usage?today=1 in order to avoid the default 7 day filter.

    </section>
</section><script id="[[Template_id]]_driver">
(function () {
    var driver= $('#[[Template_id]]_driver');
    var display = driver.prev(); driver.remove();

    display.on('remove',function (){
        display.off();
        delete driver;
        delete display;
        Template.data_delete([[Template_id]]);
    });
})(Template);
</script>
