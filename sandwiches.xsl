<?xml version="1.0" encoding="windows-1252"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>

<xsl:template match="/">
  <html>
  <body>
  <h2>Sandwiches</h2>
    <table border="2">
      <tr bgcolor="#99CCFF">
        <th align="left">Name</th>
        <th align="left">Price</th>
        <th align="left">Description</th>
      </tr>
      <xsl:for-each select="sandwiches/sandwich">
      <tr>
        <td><xsl:value-of select="sandwich_name"/></td>
        <td>&#163;<xsl:value-of select="sandwich_price"/></td>
        <td><xsl:value-of select="sandwich_description"/></td>
      </tr>
      </xsl:for-each>
    </table>
  </body>
  </html>
</xsl:template>
</xsl:stylesheet>