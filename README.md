# Graph_API_PHP_SDK
 ## Facebook-Graph API

The Graph API is the primary way to get data in and out of Facebook's social graph. It's a low-level HTTP-based API that you can use to query data, post new stories, upload photos and a variety of other tasks that an app might need to do.

The Graph API is named after the idea of a 'social graph' - a representation of the information on Facebook composed of:

nodes (basically "things" such as a User, a Photo, a Page, a Comment)
edges (the connections between those "things", such as a Page's Photos, or a Photo's Comments)
fields (info about those "things", such as the birthday of a User, or the name of a Page).

The Graph API is HTTP based, so works with any language that has an HTTP library, such as cURL, urllib.

Most Graph API requests will require the use of access tokens which your app can generate by implementing Facebook Login.

→ Facebook updates the Graph API as per the developers feedback they receive:




## Access Tokens:
An access token is basically an ID that is required in order to make calls to the Graph API. The token identifies the following:

The Facebook app ID that is making the request
The Facebook user ID that the request is associated with (if applicable)
The page ID that the request is associated with (if applicable)

Access token types available are: User Access Token, Page Access token, App Access Token.
Span:
→ By default, when you request a user access token, Facebook will return a short-lived access token which will expire in 1 hour (for security reasons).


→ Manually generated Access tokens expire every hour. (Example: access token created in the graph API Explorer.)

→ Though they expire on an hourly basis, SDK’s take care of refreshing the old ones with new ones.  
