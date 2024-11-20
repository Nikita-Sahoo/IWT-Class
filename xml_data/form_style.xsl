<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" indent="yes"/>
    <xsl:template match="/form">
        <html>
            <head>
                <title>Dynamic Form</title>
                <style>
                    form {
                        font-family: Arial, sans-serif;
                        width: 300px;
                        margin: auto;
                    }
                    label {
                        display: block;
                        margin: 10px 0 5px;
                    }
                    input, select {
                        width: 100%;
                        padding: 8px;
                        margin-bottom: 10px;
                    }
                    button {
                        width: 100%;
                        padding: 10px;
                        background-color: #007BFF;
                        color: white;
                        border: none;
                        cursor: pointer;
                    }
                    button:hover {
                        background-color: #0056b3;
                    }
                </style>
            </head>
            <body>
                <h2>Dynamic Form</h2>
                <form action="#" method="post">
                    <xsl:for-each select="fields/field">
                        <xsl:choose>
                            <!-- Text, Email, Password Fields -->
                            <xsl:when test="type='text' or type='email' or type='password'">
                                <label><xsl:value-of select="label"/></label>
                                <input type="{type}" name="{name}" placeholder="{placeholder}" />
                            </xsl:when>

                            <!-- Radio Button Fields -->
                            <xsl:when test="type='radio'">
                                <label><xsl:value-of select="label"/></label>
                                <xsl:for-each select="options/option">
                                    <input type="radio" name="{../name}" value="{.}" />
                                    <xsl:value-of select="."/><br/>
                                </xsl:for-each>
                            </xsl:when>

                            <!-- Dropdown Fields -->
                            <xsl:when test="type='dropdown'">
                                <label><xsl:value-of select="label"/></label>
                                <select name="{name}">
                                    <xsl:for-each select="options/option">
                                        <option value="{.}"><xsl:value-of select="."/></option>
                                    </xsl:for-each>
                                </select>
                            </xsl:when>

                            <!-- Checkbox Fields -->
                            <xsl:when test="type='checkbox'">
                                <label>
                                    <input type="checkbox" name="{name}" value="{value}" />
                                    <xsl:value-of select="label"/>
                                </label>
                            </xsl:when>
                        </xsl:choose>
                    </xsl:for-each>

                    <!-- Submit Button -->
                    <button type="submit">
                        <xsl:value-of select="submit"/>
                    </button>
                </form>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
