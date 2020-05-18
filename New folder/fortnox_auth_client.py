import json as js
import curl 
import requests
import urllib2

ENDPOINT='https://api.fortnox.se/3/'
COMPANY_INFO_ENDPOINT='https://api.fortnox.se/3/settings/company'
CLIENT_SECRET='your-client-secret')

# Entry point
accessToken = getAccessToken(request.get['authorization-code'])
# i don't know the get in python

if accessToken != None:
    companyInfo = getCompanyInformation(accessToken)    # 
    #  You can now use the company information to verify that the company is an existing customer or not,
    #  in this example we will just present the fetched company name.
    
    if((companyInfo != None) and (companyInfo in 'CompanySettings')):
        companyName = companyInfo['CompanySettings']['Name']
        print(companyName,' has now been activated! Thank you for using our integration!')
    else:
        print('Unable to get company information')


def getAccessToken(authorization):
    
    #  The authorization code will be provided by Fortnox when the user is activating the integration.
    #  The client secret is the code that was sent when the integration was registered with Fortnox.
      

    # Execute the request to fetch an access token, using the authorization code and client secret
    headers = {
        'authorization-code':authorization,
        'Client-Secret':CLIENT_SECRET
    }    
    curl = requests.get(ENDPOINT, headers = headers,allow_redirects=True,verify=True)   
    # Execute the request   
    curlResponse = curl.json() 
    curl.close()
    
    json = js.load(curlResponse, True)    
    if(hasErrors(json)):
        return handleError(json) 
    return json

    
    #  Given the correct authorization code is provided, an access token is returned, with this access token
    #  you can now start posting / getting your own information (provided that youre integration has access to the correct scopes).
    #  Note that the authorization code can only be used once.
        
    if ('Authorization' in json):
        accessToken = json['Authorization']['AccessToken'];   
    else:
        return handleError(json)
    return accessToken
    


def getCompanyInformation(accessToken) {

    # To fetch the customers company information you will use our client secret and the newly received access token.
    
    headers = {
        'Client-Secret':CLIENT_SECRET,
        'Access-Token':accessToken
    }
    
    curl = requests.get(COMPANY_INFO_ENDPOINT, headers = headers,allow_redirects=True,verify=True)   
    # Execute the request   
    curlResponse = curl.json() 
    curl.close()

    json = js.load(curlResponse, True)
    
    if(hasErrors(json)):
        return handleError(json) 
    return json

def hasErrors(json):
    if('ErrorInformation' in json ):   
        return json['ErrorInformation']['Error'] != None;  

    return False;

# Display error message
def handleError(error):
    if('ErrorInformation' in error):
        errorMsg = isset(error['ErrorInformation']['Message']) ? 'Error: ' + error['ErrorInformation']['Message'] : ''
        print('Failed to activate your company! ', errorMsg)
    else:
        print('Failed to activate your company!')  
    return None
